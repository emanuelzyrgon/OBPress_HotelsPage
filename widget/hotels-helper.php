<?php
function SortHotelFolders($hotel_folders)
{
    foreach ($hotel_folders as $key => $item) {
        if ($item->IsPropertyFolder == true) {
            $new_hotel_order = [];
            foreach ($hotel_folders as $key2 => $item2) {
                if ($item2->IsPropertyFolder == false && $item2->PropertyFolderUID == $item->PropertyFolderUID) {
                    if (isset($item2->PropertySequence)) {
                        if (isset($new_hotel_order[$item2->PropertySequence])) {
                            $new_hotel_order[$item2->PropertySequence + 1] = $item2;
                        } else {
                            $new_hotel_order[$item2->PropertySequence] = $item2;
                        }
                        unset($hotel_folders[$key2]);
                    } else {
                        $new_hotel_order[0] = $item2;
                        unset($hotel_folders[$key2]);
                    }
                }
            }
            ksort($new_hotel_order);
            $hotel_folders = array_merge($hotel_folders, $new_hotel_order);
        }
    }

    return $hotel_folders;
}
