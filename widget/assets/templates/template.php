<div class="obpress-chain-results-hotels-page">
    <div class="obpress-search-header-hotels">
        <div class="obpress-search-title">
            Hotels & Destinations
        </div>
        <div>
            <input type="text" id="search-input" placeholder="Search by keyword, hotel or destination" class="btn-ic">			
        </div>
    </div>
    <?php if ($folders == null) : ?>
        <?php if (isset($HotelsArrayByCountry)) : ?>
            <?php foreach ($HotelsArrayByCountry as $countryCode => $HotelsByCountry) : ?>
                <?php foreach ($HotelsByCountry as $cityCode => $HotelsByCity) : ?>
                    <div class="obpress-hotels-wrapper">
                        <div class="obpress-hotels-holder">
                            <div class="obpress-hotels-title-holder">
                                <div class="obpress-hotels-title">
                                    <?php if (isset($countries[$countryCode])) : ?>
                                        <div class="obpress-hotels-country-name"><?= $countries[$countryCode]->Name; ?></div>
                                    <?php
                                        $country = $countries[$countryCode];
                                    endif;
                                    ?>
                                    <?php if (isset($cities[$cityCode])) : ?>
                                        <div class="obpress-hotels-city-name"><?= $cities[$cityCode]->Name; ?></div>
                                    <?php elseif (isset($HotelsByCity[0]->Address) && $HotelsByCity[0]->Address->CityName != null) : ?>
                                        <div class="obpress-hotels-city-name"><?= $HotelsByCity[0]->Address->CityName; ?></div>
                                    <?php endif; ?>
                                </div>
                                <hr>
                            </div>
                            <div class="obpress-hotels-cards-holder">
                                <?php foreach ($HotelsByCity as $hotel) : ?>
                                    <div class="obpress-hotels-results-roomrate roomrate">
                                        <div class="obpress-hotels-results-hotel-image">
                                            <?php if ($hotel->ImageURL != null) : ?>
                                                <img src="<?= $hotel->ImageURL; ?>" alt="<?= $hotel->HotelRef->HotelName; ?>" class="card-img-top">
                                            <?php else : ?>
                                                <img src="<?= plugin_dir_url( __DIR__ ) . '/images/placeholderNewGrey.svg' ?>" alt="<?= $hotel->HotelRef->HotelName; ?>" class="card-img-top">
                                            <?php endif; ?>

                                            <?php
                                            $hotel_description = '';
                                            if ($hotel->VendorMessagesType != null) {
                                                foreach ($hotel->VendorMessagesType->VendorMessages as $VendorMessage) {
                                                    $hotel_description .= $VendorMessage->Description;
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="obpress-chain-results-hotel-info">
                                            <span class="hotel_stars">
                                                <?php if (isset($hotel->Award)) : ?>
                                                    <?php for ($i = 0; $i < $hotel->Award->Rating; $i++) : ?>
                                                        <svg class="hotel_star" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><defs><style>.a{fill:#f0f0f0;opacity:0;}.b{fill:#273240;}</style></defs><g transform="translate(3 13) rotate(-90)"><rect class="a" width="16" height="16" transform="translate(-3 -3)"/><path class="b" d="M6,0,8.1,3.318l3.9.913L9.4,7.195l.31,3.882L6,9.591,2.292,11.077,2.6,7.195,0,4.231l3.9-.913Z" transform="translate(10.539 -1) rotate(90)"/></g></svg>
                                                    <?php endfor; ?>
                                                    <?php if($hotel->Award->Rating != 5) : ?>
                                                        <?php for ($i = $hotel->Award->Rating; $i < 5; $i++) : ?>
                                                            <svg class="hotel_star_outline" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><defs><style>.a{fill:#f0f0f0;opacity:0;}.b{fill:none;}.c,.d{stroke:none;}.d{fill:#fdba01;}</style></defs><g transform="translate(3 13) rotate(-90)"><rect class="a" width="16" height="16" transform="translate(-3 -3)"/><g class="b" transform="translate(10.539 -1) rotate(90)"><path class="c" d="M6,0,8.1,3.318l3.9.913L9.4,7.195l.31,3.882L6,9.591,2.292,11.077,2.6,7.195,0,4.231l3.9-.913Z"/><path class="d" d="M 6 1.869792938232422 L 4.744969844818115 3.852621078491211 L 4.526219844818115 4.198211193084717 L 4.127989768981934 4.291460990905762 L 1.851779937744141 4.824450492858887 L 3.35359001159668 6.534951210021973 L 3.632650375366211 6.852791309356689 L 3.598950386047363 7.274411201477051 L 3.417158126831055 9.548601150512695 L 5.627999782562256 8.662570953369141 L 6 8.513481140136719 L 6.372000217437744 8.662570953369141 L 8.582841873168945 9.548601150512695 L 8.401050567626953 7.274411201477051 L 8.367349624633789 6.852791309356689 L 8.64640998840332 6.534951210021973 L 10.14822006225586 4.824450492858887 L 7.872010231018066 4.291460990905762 L 7.473780155181885 4.198211193084717 L 7.255030155181885 3.852621078491211 L 6 1.869792938232422 M 6 9.5367431640625e-07 L 8.100000381469727 3.317800998687744 L 12 4.231011390686035 L 9.397870063781738 7.19473123550415 L 9.708200454711914 11.0769214630127 L 6 9.590801239013672 L 2.291799545288086 11.0769214630127 L 2.602129936218262 7.19473123550415 L 0 4.231011390686035 L 3.899999618530273 3.317800998687744 L 6 9.5367431640625e-07 Z"/></g></g></svg>
                                                        <?php endfor; ?>
                                                    <?php endif; ?>
                                                
                                                <?php endif; ?>
                                            </span>
                                            <a href="<?= home_url($path='/hotel-results/?q=' . $hotel->HotelRef->HotelCode); ?>" class="obpress-hotels-name"><?= $hotel->HotelRef->HotelName; ?></a>
                                            <div class="obpress-hotels-location"><?= $hotel->Address->AddressLine; ?></div>
                                            <div class="obpress-hotels-desktop obpress-hotel-text">
                                                <?php if($hotel_description != '') : ?>
                                                    <p class="obpress-hotels-short-description">
                                                        <?= substr($hotel_description, 0, 140) . '...' ?>
                                                        <a href="<?= home_url($path='/hotel-results/?q=' . $hotel->HotelRef->HotelCode); ?>" class="obpress-hotels-see-more" target="_blank">see more</a>
                                                    </p>
                                                <?php endif; ?>
                                            </div>
                                            <div class="obpress-hotels-mobile obpress-hotel-text">
                                                <?php if($hotel_description != '') : ?>
                                                    <p class="obpress-hotels-short-description">
                                                        <?= substr($hotel_description, 0, 60) . '...' ?>
                                                        <a href="<?= home_url($path='/hotel-results/?q=' . $hotel->HotelRef->HotelCode); ?>" class="obpress-hotels-see-more" target="_blank">see more</a>
                                                    </p>
                                                <?php endif; ?>
                                            </div>
                                            <div class="obpress-hotels-button-text-holder">
                                                <a href="<?= home_url($path='/hotel-results/?q=' . $hotel->HotelRef->HotelCode); ?>" class="obpress-hotels-button obpress-primary-btn" target="_blank">DISCOVER</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php else: ?>
        <?php foreach($folders as $key1 => $folder) : ?>
            <div class="obpress-hotels-wrapper">
                <div class="obpress-hotels-holder">
                    <div class="obpress-hotels-title-holder">
                        <div class="obpress-hotels-title">
                            <?php if (isset($folder->PropertyFolderName)) : ?>
                                <div class="obpress-hotels-country-name"><?= $folder->PropertyFolderName; ?></div>
                            <?php endif; ?>
                        </div>
                        <hr>
                    </div>
                    <div class="obpress-hotels-cards-holder">
                        <?php foreach($folder->hotels as $hotel_from_folder) : ?>
                            <?php 
                                $hotel = $hotel_from_folder->descriptive_content;    
                            ?>
                            <div class="obpress-hotels-results-roomrate roomrate">
                                <div class="obpress-hotels-results-hotel-image">
                                    <?php if ($hotel->ImageURL != null) : ?>
                                        <img src="<?= $hotel->ImageURL; ?>" alt="<?= $hotel->HotelRef->HotelName; ?>" class="card-img-top">
                                    <?php else : ?>
                                        <img src="<?= plugin_dir_url( __DIR__ ) . '/images/placeholderNewGrey.svg' ?>" alt="<?= $hotel->HotelRef->HotelName; ?>" class="card-img-top">
                                    <?php endif; ?>

                                    <?php
                                    $hotel_description = '';
                                    if ($hotel->VendorMessagesType != null) {
                                        foreach ($hotel->VendorMessagesType->VendorMessages as $VendorMessage) {
                                            $hotel_description .= $VendorMessage->Description;
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="obpress-chain-results-hotel-info">
                                    <span class="hotel_stars">
                                        <?php if (isset($hotel->Award)) : ?>
                                            <?php for ($i = 0; $i < $hotel->Award->Rating; $i++) : ?>
                                                <svg class="hotel_star" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><defs><style>.a{fill:#f0f0f0;opacity:0;}.b{fill:#273240;}</style></defs><g transform="translate(3 13) rotate(-90)"><rect class="a" width="16" height="16" transform="translate(-3 -3)"/><path class="b" d="M6,0,8.1,3.318l3.9.913L9.4,7.195l.31,3.882L6,9.591,2.292,11.077,2.6,7.195,0,4.231l3.9-.913Z" transform="translate(10.539 -1) rotate(90)"/></g></svg>
                                            <?php endfor; ?>
                                            <?php if($hotel->Award->Rating != 5) : ?>
                                                <?php for ($i = $hotel->Award->Rating; $i < 5; $i++) : ?>
                                                    <svg class="hotel_star_outline" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><defs><style>.a{fill:#f0f0f0;opacity:0;}.b{fill:none;}.c,.d{stroke:none;}.d{fill:#fdba01;}</style></defs><g transform="translate(3 13) rotate(-90)"><rect class="a" width="16" height="16" transform="translate(-3 -3)"/><g class="b" transform="translate(10.539 -1) rotate(90)"><path class="c" d="M6,0,8.1,3.318l3.9.913L9.4,7.195l.31,3.882L6,9.591,2.292,11.077,2.6,7.195,0,4.231l3.9-.913Z"/><path class="d" d="M 6 1.869792938232422 L 4.744969844818115 3.852621078491211 L 4.526219844818115 4.198211193084717 L 4.127989768981934 4.291460990905762 L 1.851779937744141 4.824450492858887 L 3.35359001159668 6.534951210021973 L 3.632650375366211 6.852791309356689 L 3.598950386047363 7.274411201477051 L 3.417158126831055 9.548601150512695 L 5.627999782562256 8.662570953369141 L 6 8.513481140136719 L 6.372000217437744 8.662570953369141 L 8.582841873168945 9.548601150512695 L 8.401050567626953 7.274411201477051 L 8.367349624633789 6.852791309356689 L 8.64640998840332 6.534951210021973 L 10.14822006225586 4.824450492858887 L 7.872010231018066 4.291460990905762 L 7.473780155181885 4.198211193084717 L 7.255030155181885 3.852621078491211 L 6 1.869792938232422 M 6 9.5367431640625e-07 L 8.100000381469727 3.317800998687744 L 12 4.231011390686035 L 9.397870063781738 7.19473123550415 L 9.708200454711914 11.0769214630127 L 6 9.590801239013672 L 2.291799545288086 11.0769214630127 L 2.602129936218262 7.19473123550415 L 0 4.231011390686035 L 3.899999618530273 3.317800998687744 L 6 9.5367431640625e-07 Z"/></g></g></svg>
                                                <?php endfor; ?>
                                            <?php endif; ?>
                                        
                                        <?php endif; ?>
                                    </span>
                                    <a href="<?= home_url($path='/hotel-results/?q=' . $hotel->HotelRef->HotelCode); ?>" class="obpress-hotels-name"><?= $hotel->HotelRef->HotelName; ?></a>
                                    <div class="obpress-hotels-location"><?= $hotel->Address->AddressLine; ?></div>
                                    <div class="obpress-hotels-desktop obpress-hotel-text">
                                        <?php if($hotel_description != '') : ?>
                                            <p class="obpress-hotels-short-description">
                                                <?= substr($hotel_description, 0, 140) . '...' ?>
                                                <a href="<?= home_url($path='/hotel-results/?q=' . $hotel->HotelRef->HotelCode); ?>" class="obpress-hotels-see-more" target="_blank">see more</a>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="obpress-hotels-mobile obpress-hotel-text">
                                        <?php if($hotel_description != '') : ?>
                                            <p class="obpress-hotels-short-description">
                                                <?= substr($hotel_description, 0, 60) . '...' ?>
                                                <a href="<?= home_url($path='/hotel-results/?q=' . $hotel->HotelRef->HotelCode); ?>" class="obpress-hotels-see-more" target="_blank">see more</a>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="obpress-hotels-button-text-holder">
                                        <a href="<?= home_url($path='/hotel-results/?q=' . $hotel->HotelRef->HotelCode); ?>" class="obpress-hotels-button obpress-primary-btn" target="_blank">DISCOVER</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <div class="obpress-hotels-no-results s-none">
        <img src="<?= plugin_dir_url( __DIR__ ) . '/images/not_found.svg' ?>" alt="No results found" class="obpress-hotels-no-results-img">			
        <p class="obpress-hotels-no-results-text">No results found</p>
    </div>
</div>