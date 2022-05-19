<?php 

$chainId = get_option('chain_id');
$removedHotels = json_decode(get_option('removed_hotels'));
$hotelFolders = BeApi::getClientPropertyFolders($chainId)->Result;
$counter_for_hotel = 0;

foreach ($hotelFolders as $hotel_in_folder_key => $hotel_in_folder) {
    if ($hotel_in_folder->IsPropertyFolder == false) {
        $counter_for_hotel++;
    }

    if (isset($removedHotels) && $removedHotels != null) {
        foreach ($removedHotels as $removedHotel) {
            if (isset($hotel_in_folder->Property_UID) && $hotel_in_folder->Property_UID != null && $hotel_in_folder->Property_UID == $removedHotel) {
                unset($hotelFolders[$hotel_in_folder_key]);
            }
        }
    }
}
$hotelFolders = array_values($hotelFolders);


//if set, if today or later
$todayDateTime = new \DateTime('today');

// if missing dates, make it today
if ($_GET['CheckIn'] == false || $_GET['CheckOut'] == false) {
    $start_date_url = $todayDateTime->format('dmY');
    $end_date_url = $todayDateTime->modify('+1 day')->format('dmY');
} else {
    $start_date_url = $_GET['CheckIn'];
    $end_date_url = $_GET['CheckOut'];
}

$start_date = \DateTime::createFromFormat('dmY', $start_date_url);
$CheckIn = $start_date->format('dmY');
$CheckInShow = $start_date->format('d/m/Y');
$CheckInShowMobile = $start_date->format('d M Y');


$end_date = \DateTime::createFromFormat('dmY', $end_date_url);
$CheckOut = $end_date->format('dmY');
$CheckOutShow = $end_date->format('d/m/Y');
$CheckOutShowMobile = $end_date->format('d M Y');

new Lang_Curr_Functions();
Lang_Curr_Functions::chainOrHotel($id);

$languages = Lang_Curr_Functions::getLanguagesArray();
$language = Lang_Curr_Functions::getLanguage();
$language_object = Lang_Curr_Functions::getLanguageObject();
$currencies = Lang_Curr_Functions::getCurrenciesArray();
$currency = Lang_Curr_Functions::getCurrency();

new ChainResultsController();
$return = ChainResultsController::chainResults();

$hotels_infos = $return['hotels_infos'];
$data = $return['data'];
$descriptive_infos = $return['descriptive_infos'];
$countries = $return['countries'];
$cities = $return['cities'];

if ($_GET['ad'] && intval($_GET['ad']) > 0) {
    $adults = intval($_GET['ad']);
} else {
    $adults = 1;
}

if ($_GET['ch'] && intval($_GET['ch']) >= 0) {
    $children = intval($_GET['ch']);
}

$nrooms = $_GET['NRooms'];

if ($nrooms != "" && isset($nrooms)) {
    $number_of_rooms = $nrooms;
} else {
    $number_of_rooms = 1;
}

$nights =  (abs(strtotime($start_date->format('Y-m-d')) - strtotime($end_date->format('Y-m-d')))) / 86400;
$guests = $adults + $children;
$childrenMaxAge = 17;

$obpressCustomOptions = get_option('obpress_template_custom_options');
$chainResultsOptions = json_decode(stripslashes($obpressCustomOptions['pageOptions']))->chainResultsOptions;

$hotels = BeApi::ApiCache('hotel_search_chain_' . $chainId . "_" . $language, BeApi::$cache_time['hotel_search_chain'], function () use ($chainId, $language) {
    return BeApi::getHotelSearchForChain($chainId, "true", $language);
});

$HotelDescriptiveContents = $hotels->PropertiesType->Properties;
foreach ($HotelDescriptiveContents as $key => $HotelDescriptiveContent) {
    $HotelDescriptiveContents[$HotelDescriptiveContent->HotelRef->HotelCode] = $HotelDescriptiveContents[$key];
    unset($HotelDescriptiveContents[$key]);
}

$hotelFolders = BeApi::ApiCache('hotel_folders_' . $chainId, BeApi::$cache_time['hotel_folders'], function () use ($chainId) {
    return BeApi::getClientPropertyFolders($chainId)->Result;
});

$hotelFolders = SortHotelFolders($hotelFolders);


$hotels_and_folders = $hotelFolders;
$hotel_folders = json_encode($hotel_folders);
$HotelsArrayByCountry = [];
$HotelsArrayByCountryWithoutCountryCode = [];


$folders = [];
foreach ($hotels_and_folders as $key => $item) {
    if ($item->IsPropertyFolder == true) {
        $item->hotels = [];
        $folders[$item->PropertyFolderUID] = $item;
    }
}
if (!empty($folders)) {
    foreach ($hotels_and_folders as $key => $item) {
        if ($item->IsPropertyFolder == false) {
            $item->descriptive_content = [];
            $folders[$item->PropertyFolderUID]->hotels[] = $item;
        }
    }
}
$empty_folders = true;
foreach ($folders as $folder) {
    if (isset($folder->IsPropertyFolder) && count($folder->hotels) > 0) {
        $empty_folders = false;
        break;
    }
}
if ($empty_folders == false) {
    foreach ($folders as $folder) {
        foreach ($folder->hotels as $hotel_in_folder) {
            foreach ($HotelDescriptiveContents as $key => $HotelDescriptiveContent) {
                if ($key == $hotel_in_folder->Property_UID) {
                    $hotel_in_folder->descriptive_content = $HotelDescriptiveContent;
                }
            }
        }
    }
} else {
    //SORTING HOTELS BY COUNTRY AND CITY
    foreach ($HotelDescriptiveContents as $HotelDescriptiveContent) {
        $HotelsArrayByCountry[$HotelDescriptiveContent->Address->CountryCode][$HotelDescriptiveContent->Address->CityCode][] = $HotelDescriptiveContent;
    }
    $folders = null;
}