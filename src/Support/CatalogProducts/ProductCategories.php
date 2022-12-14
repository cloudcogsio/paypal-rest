<?php

namespace Cloudcogs\PayPal\Support\CatalogProducts;

use Cloudcogs\PayPal\Exception\InvalidProductCategoryException;

class ProductCategories
{
    const AC_REFRIGERATION_REPAIR = 'AC_REFRIGERATION_REPAIR';
    const ACADEMIC_SOFTWARE = 'ACADEMIC_SOFTWARE';
    const ACCESSORIES = 'ACCESSORIES';
    const ACCOUNTING = 'ACCOUNTING';
    const ADULT = 'ADULT';
    const ADVERTISING = 'ADVERTISING';
    const AFFILIATED_AUTO_RENTAL = 'AFFILIATED_AUTO_RENTAL';
    const AGENCIES = 'AGENCIES';
    const AGGREGATORS = 'AGGREGATORS';
    const AGRICULTURAL_COOPERATIVE_FOR_MAIL_ORDER = 'AGRICULTURAL_COOPERATIVE_FOR_MAIL_ORDER';
    const AIR_CARRIERS_AIRLINES = 'AIR_CARRIERS_AIRLINES';
    const AIRLINES = 'AIRLINES';
    const AIRPORTS_FLYING_FIELDS = 'AIRPORTS_FLYING_FIELDS';
    const ALCOHOLIC_BEVERAGES = 'ALCOHOLIC_BEVERAGES';
    const AMUSEMENT_PARKS_CARNIVALS = 'AMUSEMENT_PARKS_CARNIVALS';
    const ANIMATION = 'ANIMATION';
    const ANTIQUES = 'ANTIQUES';
    const APPLIANCES = 'APPLIANCES';
    const AQUARIAMS_SEAQUARIUMS_DOLPHINARIUMS = 'AQUARIAMS_SEAQUARIUMS_DOLPHINARIUMS';
    const ARCHITECTURAL_ENGINEERING_AND_SURVEYING_SERVICES = 'ARCHITECTURAL_ENGINEERING_AND_SURVEYING_SERVICES';
    const ART_AND_CRAFT_SUPPLIES = 'ART_AND_CRAFT_SUPPLIES';
    const ART_DEALERS_AND_GALLERIES = 'ART_DEALERS_AND_GALLERIES';
    const ARTIFACTS_GRAVE_RELATED_AND_NATIVE_AMERICAN_CRAFTS = 'ARTIFACTS_GRAVE_RELATED_AND_NATIVE_AMERICAN_CRAFTS';
    const ARTS_AND_CRAFTS = 'ARTS_AND_CRAFTS';
    const ARTS_CRAFTS_AND_COLLECTIBLES = 'ARTS_CRAFTS_AND_COLLECTIBLES';
    const AUDIO_BOOKS = 'AUDIO_BOOKS';
    const AUTO_ASSOCIATIONS_CLUBS = 'AUTO_ASSOCIATIONS_CLUBS';
    const AUTO_DEALER_USED_ONLY = 'AUTO_DEALER_USED_ONLY';
    const AUTO_RENTALS = 'AUTO_RENTALS';
    const AUTO_SERVICE = 'AUTO_SERVICE';
    const AUTOMATED_FUEL_DISPENSERS = 'AUTOMATED_FUEL_DISPENSERS';
    const AUTOMOBILE_ASSOCIATIONS = 'AUTOMOBILE_ASSOCIATIONS';
    const AUTOMOTIVE = 'AUTOMOTIVE';
    const AUTOMOTIVE_REPAIR_SHOPS_NON_DEALER = 'AUTOMOTIVE_REPAIR_SHOPS_NON_DEALER';
    const AUTOMOTIVE_TOP_AND_BODY_SHOPS = 'AUTOMOTIVE_TOP_AND_BODY_SHOPS';
    const AVIATION = 'AVIATION';
    const BABIES_CLOTHING_AND_SUPPLIES = 'BABIES_CLOTHING_AND_SUPPLIES';
    const BABY = 'BABY';
    const BANDS_ORCHESTRAS_ENTERTAINERS = 'BANDS_ORCHESTRAS_ENTERTAINERS';
    const BARBIES = 'BARBIES';
    const BATH_AND_BODY = 'BATH_AND_BODY';
    const BATTERIES = 'BATTERIES';
    const BEAN_BABIES = 'BEAN_BABIES';
    const BEAUTY = 'BEAUTY';
    const BEAUTY_AND_FRAGRANCES = 'BEAUTY_AND_FRAGRANCES';
    const BED_AND_BATH = 'BED_AND_BATH';
    const BICYCLE_SHOPS_SALES_AND_SERVICE = 'BICYCLE_SHOPS_SALES_AND_SERVICE';
    const BICYCLES_AND_ACCESSORIES = 'BICYCLES_AND_ACCESSORIES';
    const BILLIARD_POOL_ESTABLISHMENTS = 'BILLIARD_POOL_ESTABLISHMENTS';
    const BOAT_DEALERS = 'BOAT_DEALERS';
    const BOAT_RENTALS_AND_LEASING = 'BOAT_RENTALS_AND_LEASING';
    const BOATING_SAILING_AND_ACCESSORIES = 'BOATING_SAILING_AND_ACCESSORIES';
    const BOOKS = 'BOOKS';
    const BOOKS_AND_MAGAZINES = 'BOOKS_AND_MAGAZINES';
    const BOOKS_MANUSCRIPTS = 'BOOKS_MANUSCRIPTS';
    const BOOKS_PERIODICALS_AND_NEWSPAPERS = 'BOOKS_PERIODICALS_AND_NEWSPAPERS';
    const BOWLING_ALLEYS = 'BOWLING_ALLEYS';
    const BULLETIN_BOARD = 'BULLETIN_BOARD';
    const BUS_LINE = 'BUS_LINE';
    const BUS_LINES_CHARTERS_TOUR_BUSES = 'BUS_LINES_CHARTERS_TOUR_BUSES';
    const BUSINESS = 'BUSINESS';
    const BUSINESS_AND_SECRETARIAL_SCHOOLS = 'BUSINESS_AND_SECRETARIAL_SCHOOLS';
    const BUYING_AND_SHOPPING_SERVICES_AND_CLUBS = 'BUYING_AND_SHOPPING_SERVICES_AND_CLUBS';
    const CABLE_SATELLITE_AND_OTHER_PAY_TELEVISION_AND_RADIO_SERVICES = 'CABLE_SATELLITE_AND_OTHER_PAY_TELEVISION_AND_RADIO_SERVICES';
    const CABLE_SATELLITE_AND_OTHER_PAY_TV_AND_RADIO = 'CABLE_SATELLITE_AND_OTHER_PAY_TV_AND_RADIO';
    const CAMERA_AND_PHOTOGRAPHIC_SUPPLIES = 'CAMERA_AND_PHOTOGRAPHIC_SUPPLIES';
    const CAMERAS = 'CAMERAS';
    const CAMERAS_AND_PHOTOGRAPHY = 'CAMERAS_AND_PHOTOGRAPHY';
    const CAMPER_RECREATIONAL_AND_UTILITY_TRAILER_DEALERS = 'CAMPER_RECREATIONAL_AND_UTILITY_TRAILER_DEALERS';
    const CAMPING_AND_OUTDOORS = 'CAMPING_AND_OUTDOORS';
    const CAMPING_AND_SURVIVAL = 'CAMPING_AND_SURVIVAL';
    const CAR_AND_TRUCK_DEALERS = 'CAR_AND_TRUCK_DEALERS';
    const CAR_AND_TRUCK_DEALERS_USED_ONLY = 'CAR_AND_TRUCK_DEALERS_USED_ONLY';
    const CAR_AUDIO_AND_ELECTRONICS = 'CAR_AUDIO_AND_ELECTRONICS';
    const CAR_RENTAL_AGENCY = 'CAR_RENTAL_AGENCY';
    const CATALOG_MERCHANT = 'CATALOG_MERCHANT';
    const CATALOG_RETAIL_MERCHANT = 'CATALOG_RETAIL_MERCHANT';
    const CATERING_SERVICES = 'CATERING_SERVICES';
    const CHARITY = 'CHARITY';
    const CHECK_CASHIER = 'CHECK_CASHIER';
    const CHILD_CARE_SERVICES = 'CHILD_CARE_SERVICES';
    const CHILDREN_BOOKS = 'CHILDREN_BOOKS';
    const CHIROPODISTS_PODIATRISTS = 'CHIROPODISTS_PODIATRISTS';
    const CHIROPRACTORS = 'CHIROPRACTORS';
    const CIGAR_STORES_AND_STANDS = 'CIGAR_STORES_AND_STANDS';
    const CIVIC_SOCIAL_FRATERNAL_ASSOCIATIONS = 'CIVIC_SOCIAL_FRATERNAL_ASSOCIATIONS';
    const CIVIL_SOCIAL_FRAT_ASSOCIATIONS = 'CIVIL_SOCIAL_FRAT_ASSOCIATIONS';
    const CLOTHING = 'CLOTHING';
    const CLOTHING_ACCESSORIES_AND_SHOES = 'CLOTHING_ACCESSORIES_AND_SHOES';
    const CLOTHING_RENTAL = 'CLOTHING_RENTAL';
    const COFFEE_AND_TEA = 'COFFEE_AND_TEA';
    const COIN_OPERATED_BANKS_AND_CASINOS = 'COIN_OPERATED_BANKS_AND_CASINOS';
    const COLLECTIBLES = 'COLLECTIBLES';
    const COLLECTION_AGENCY = 'COLLECTION_AGENCY';
    const COLLEGES_AND_UNIVERSITIES = 'COLLEGES_AND_UNIVERSITIES';
    const COMMERCIAL_EQUIPMENT = 'COMMERCIAL_EQUIPMENT';
    const COMMERCIAL_FOOTWEAR = 'COMMERCIAL_FOOTWEAR';
    const COMMERCIAL_PHOTOGRAPHY = 'COMMERCIAL_PHOTOGRAPHY';
    const COMMERCIAL_PHOTOGRAPHY_ART_AND_GRAPHICS = 'COMMERCIAL_PHOTOGRAPHY_ART_AND_GRAPHICS';
    const COMMERCIAL_SPORTS_PROFESSIONA = 'COMMERCIAL_SPORTS_PROFESSIONA';
    const COMMODITIES_AND_FUTURES_EXCHANGE = 'COMMODITIES_AND_FUTURES_EXCHANGE';
    const COMPUTER_AND_DATA_PROCESSING_SERVICES = 'COMPUTER_AND_DATA_PROCESSING_SERVICES';
    const COMPUTER_HARDWARE_AND_SOFTWARE = 'COMPUTER_HARDWARE_AND_SOFTWARE';
    const COMPUTER_MAINTENANCE_REPAIR_AND_SERVICES_NOT_ELSEWHERE_CLAS = 'COMPUTER_MAINTENANCE_REPAIR_AND_SERVICES_NOT_ELSEWHERE_CLAS';
    const CONSTRUCTION = 'CONSTRUCTION';
    const CONSTRUCTION_MATERIALS_NOT_ELSEWHERE_CLASSIFIED = 'CONSTRUCTION_MATERIALS_NOT_ELSEWHERE_CLASSIFIED';
    const CONSULTING_SERVICES = 'CONSULTING_SERVICES';
    const CONSUMER_CREDIT_REPORTING_AGENCIES = 'CONSUMER_CREDIT_REPORTING_AGENCIES';
    const CONVALESCENT_HOMES = 'CONVALESCENT_HOMES';
    const COSMETIC_STORES = 'COSMETIC_STORES';
    const COUNSELING_SERVICES_DEBT_MARRIAGE_PERSONAL = 'COUNSELING_SERVICES_DEBT_MARRIAGE_PERSONAL';
    const COUNTERFEIT_CURRENCY_AND_STAMPS = 'COUNTERFEIT_CURRENCY_AND_STAMPS';
    const COUNTERFEIT_ITEMS = 'COUNTERFEIT_ITEMS';
    const COUNTRY_CLUBS = 'COUNTRY_CLUBS';
    const COURIER_SERVICES = 'COURIER_SERVICES';
    const COURIER_SERVICES_AIR_AND_GROUND_AND_FREIGHT_FORWARDERS = 'COURIER_SERVICES_AIR_AND_GROUND_AND_FREIGHT_FORWARDERS';
    const COURT_COSTS_ALIMNY_CHILD_SUPT = 'COURT_COSTS_ALIMNY_CHILD_SUPT';
    const COURT_COSTS_INCLUDING_ALIMONY_AND_CHILD_SUPPORT_COURTS_OF_LAW = 'COURT_COSTS_INCLUDING_ALIMONY_AND_CHILD_SUPPORT_COURTS_OF_LAW';
    const CREDIT_CARDS = 'CREDIT_CARDS';
    const CREDIT_UNION = 'CREDIT_UNION';
    const CULTURE_AND_RELIGION = 'CULTURE_AND_RELIGION';
    const DAIRY_PRODUCTS_STORES = 'DAIRY_PRODUCTS_STORES';
    const DANCE_HALLS_STUDIOS_AND_SCHOOLS = 'DANCE_HALLS_STUDIOS_AND_SCHOOLS';
    const DECORATIVE = 'DECORATIVE';
    const DENTAL = 'DENTAL';
    const DENTISTS_AND_ORTHODONTISTS = 'DENTISTS_AND_ORTHODONTISTS';
    const DEPARTMENT_STORES = 'DEPARTMENT_STORES';
    const DESKTOP_PCS = 'DESKTOP_PCS';
    const DEVICES = 'DEVICES';
    const DIECAST_TOYS_VEHICLES = 'DIECAST_TOYS_VEHICLES';
    const DIGITAL_GAMES = 'DIGITAL_GAMES';
    const DIGITAL_MEDIA_BOOKS_MOVIES_MUSIC = 'DIGITAL_MEDIA_BOOKS_MOVIES_MUSIC';
    const DIRECT_MARKETING = 'DIRECT_MARKETING';
    const DIRECT_MARKETING_CATALOG_MERCHANT = 'DIRECT_MARKETING_CATALOG_MERCHANT';
    const DIRECT_MARKETING_INBOUND_TELE = 'DIRECT_MARKETING_INBOUND_TELE';
    const DIRECT_MARKETING_OUTBOUND_TELE = 'DIRECT_MARKETING_OUTBOUND_TELE';
    const DIRECT_MARKETING_SUBSCRIPTION = 'DIRECT_MARKETING_SUBSCRIPTION';
    const DISCOUNT_STORES = 'DISCOUNT_STORES';
    const DOOR_TO_DOOR_SALES = 'DOOR_TO_DOOR_SALES';
    const DRAPERY_WINDOW_COVERING_AND_UPHOLSTERY = 'DRAPERY_WINDOW_COVERING_AND_UPHOLSTERY';
    const DRINKING_PLACES = 'DRINKING_PLACES';
    const DRUGSTORE = 'DRUGSTORE';
    const DURABLE_GOODS = 'DURABLE_GOODS';
    const ECOMMERCE_DEVELOPMENT = 'ECOMMERCE_DEVELOPMENT';
    const ECOMMERCE_SERVICES = 'ECOMMERCE_SERVICES';
    const EDUCATIONAL_AND_TEXTBOOKS = 'EDUCATIONAL_AND_TEXTBOOKS';
    const ELECTRIC_RAZOR_STORES = 'ELECTRIC_RAZOR_STORES';
    const ELECTRICAL_AND_SMALL_APPLIANCE_REPAIR = 'ELECTRICAL_AND_SMALL_APPLIANCE_REPAIR';
    const ELECTRICAL_CONTRACTORS = 'ELECTRICAL_CONTRACTORS';
    const ELECTRICAL_PARTS_AND_EQUIPMENT = 'ELECTRICAL_PARTS_AND_EQUIPMENT';
    const ELECTRONIC_CASH = 'ELECTRONIC_CASH';
    const ELEMENTARY_AND_SECONDARY_SCHOOLS = 'ELEMENTARY_AND_SECONDARY_SCHOOLS';
    const EMPLOYMENT = 'EMPLOYMENT';
    const ENTERTAINERS = 'ENTERTAINERS';
    const ENTERTAINMENT_AND_MEDIA = 'ENTERTAINMENT_AND_MEDIA';
    const EQUIP_TOOL_FURNITURE_AND_APPLIANCE_RENTAL_AND_LEASING = 'EQUIP_TOOL_FURNITURE_AND_APPLIANCE_RENTAL_AND_LEASING';
    const ESCROW = 'ESCROW';
    const EVENT_AND_WEDDING_PLANNING = 'EVENT_AND_WEDDING_PLANNING';
    const EXERCISE_AND_FITNESS = 'EXERCISE_AND_FITNESS';
    const EXERCISE_EQUIPMENT = 'EXERCISE_EQUIPMENT';
    const EXTERMINATING_AND_DISINFECTING_SERVICES = 'EXTERMINATING_AND_DISINFECTING_SERVICES';
    const FABRICS_AND_SEWING = 'FABRICS_AND_SEWING';
    const FAMILY_CLOTHING_STORES = 'FAMILY_CLOTHING_STORES';
    const FASHION_JEWELRY = 'FASHION_JEWELRY';
    const FAST_FOOD_RESTAURANTS = 'FAST_FOOD_RESTAURANTS';
    const FICTION_AND_NONFICTION = 'FICTION_AND_NONFICTION';
    const FINANCE_COMPANY = 'FINANCE_COMPANY';
    const FINANCIAL_AND_INVESTMENT_ADVICE = 'FINANCIAL_AND_INVESTMENT_ADVICE';
    const FINANCIAL_INSTITUTIONS_MERCHANDISE_AND_SERVICES = 'FINANCIAL_INSTITUTIONS_MERCHANDISE_AND_SERVICES';
    const FIREARM_ACCESSORIES = 'FIREARM_ACCESSORIES';
    const FIREARMS_WEAPONS_AND_KNIVES = 'FIREARMS_WEAPONS_AND_KNIVES';
    const FIREPLACE_AND_FIREPLACE_SCREENS = 'FIREPLACE_AND_FIREPLACE_SCREENS';
    const FIREWORKS = 'FIREWORKS';
    const FISHING = 'FISHING';
    const FLORISTS = 'FLORISTS';
    const FLOWERS = 'FLOWERS';
    const FOOD_DRINK_AND_NUTRITION = 'FOOD_DRINK_AND_NUTRITION';
    const FOOD_PRODUCTS = 'FOOD_PRODUCTS';
    const FOOD_RETAIL_AND_SERVICE = 'FOOD_RETAIL_AND_SERVICE';
    const FRAGRANCES_AND_PERFUMES = 'FRAGRANCES_AND_PERFUMES';
    const FREEZER_AND_LOCKER_MEAT_PROVISIONERS = 'FREEZER_AND_LOCKER_MEAT_PROVISIONERS';
    const FUEL_DEALERS_FUEL_OIL_WOOD_AND_COAL = 'FUEL_DEALERS_FUEL_OIL_WOOD_AND_COAL';
    const FUEL_DEALERS_NON_AUTOMOTIVE = 'FUEL_DEALERS_NON_AUTOMOTIVE';
    const FUNERAL_SERVICES_AND_CREMATORIES = 'FUNERAL_SERVICES_AND_CREMATORIES';
    const FURNISHING_AND_DECORATING = 'FURNISHING_AND_DECORATING';
    const FURNITURE = 'FURNITURE';
    const FURRIERS_AND_FUR_SHOPS = 'FURRIERS_AND_FUR_SHOPS';
    const GADGETS_AND_OTHER_ELECTRONICS = 'GADGETS_AND_OTHER_ELECTRONICS';
    const GAMBLING = 'GAMBLING';
    const GAME_SOFTWARE = 'GAME_SOFTWARE';
    const GAMES = 'GAMES';
    const GARDEN_SUPPLIES = 'GARDEN_SUPPLIES';
    const GENERAL = 'GENERAL';
    const GENERAL_CONTRACTORS = 'GENERAL_CONTRACTORS';
    const GENERAL_GOVERNMENT = 'GENERAL_GOVERNMENT';
    const GENERAL_SOFTWARE = 'GENERAL_SOFTWARE';
    const GENERAL_TELECOM = 'GENERAL_TELECOM';
    const GIFTS_AND_FLOWERS = 'GIFTS_AND_FLOWERS';
    const GLASS_PAINT_AND_WALLPAPER_STORES = 'GLASS_PAINT_AND_WALLPAPER_STORES';
    const GLASSWARE_CRYSTAL_STORES = 'GLASSWARE_CRYSTAL_STORES';
    const GOVERNMENT = 'GOVERNMENT';
    const GOVERNMENT_IDS_AND_LICENSES = 'GOVERNMENT_IDS_AND_LICENSES';
    const GOVERNMENT_LICENSED_ON_LINE_CASINOS_ON_LINE_GAMBLING = 'GOVERNMENT_LICENSED_ON_LINE_CASINOS_ON_LINE_GAMBLING';
    const GOVERNMENT_OWNED_LOTTERIES = 'GOVERNMENT_OWNED_LOTTERIES';
    const GOVERNMENT_SERVICES = 'GOVERNMENT_SERVICES';
    const GRAPHIC_AND_COMMERCIAL_DESIGN = 'GRAPHIC_AND_COMMERCIAL_DESIGN';
    const GREETING_CARDS = 'GREETING_CARDS';
    const GROCERY_STORES_AND_SUPERMARKETS = 'GROCERY_STORES_AND_SUPERMARKETS';
    const HARDWARE_AND_TOOLS = 'HARDWARE_AND_TOOLS';
    const HARDWARE_EQUIPMENT_AND_SUPPLIES = 'HARDWARE_EQUIPMENT_AND_SUPPLIES';
    const HAZARDOUS_RESTRICTED_AND_PERISHABLE_ITEMS = 'HAZARDOUS_RESTRICTED_AND_PERISHABLE_ITEMS';
    const HEALTH_AND_BEAUTY_SPAS = 'HEALTH_AND_BEAUTY_SPAS';
    const HEALTH_AND_NUTRITION = 'HEALTH_AND_NUTRITION';
    const HEALTH_AND_PERSONAL_CARE = 'HEALTH_AND_PERSONAL_CARE';
    const HEARING_AIDS_SALES_AND_SUPPLIES = 'HEARING_AIDS_SALES_AND_SUPPLIES';
    const HEATING_PLUMBING_AC = 'HEATING_PLUMBING_AC';
    const HIGH_RISK_MERCHANT = 'HIGH_RISK_MERCHANT';
    const HIRING_SERVICES = 'HIRING_SERVICES';
    const HOBBIES_TOYS_AND_GAMES = 'HOBBIES_TOYS_AND_GAMES';
    const HOME_AND_GARDEN = 'HOME_AND_GARDEN';
    const HOME_AUDIO = 'HOME_AUDIO';
    const HOME_DECOR = 'HOME_DECOR';
    const HOME_ELECTRONICS = 'HOME_ELECTRONICS';
    const HOSPITALS = 'HOSPITALS';
    const HOTELS_MOTELS_INNS_RESORTS = 'HOTELS_MOTELS_INNS_RESORTS';
    const HOUSEWARES = 'HOUSEWARES';
    const HUMAN_PARTS_AND_REMAINS = 'HUMAN_PARTS_AND_REMAINS';
    const HUMOROUS_GIFTS_AND_NOVELTIES = 'HUMOROUS_GIFTS_AND_NOVELTIES';
    const HUNTING = 'HUNTING';
    const IDS_LICENSES_AND_PASSPORTS = 'IDS_LICENSES_AND_PASSPORTS';
    const ILLEGAL_DRUGS_AND_PARAPHERNALIA = 'ILLEGAL_DRUGS_AND_PARAPHERNALIA';
    const INDUSTRIAL = 'INDUSTRIAL';
    const INDUSTRIAL_AND_MANUFACTURING_SUPPLIES = 'INDUSTRIAL_AND_MANUFACTURING_SUPPLIES';
    const INSURANCE_AUTO_AND_HOME = 'INSURANCE_AUTO_AND_HOME';
    const INSURANCE_DIRECT = 'INSURANCE_DIRECT';
    const INSURANCE_LIFE_AND_ANNUITY = 'INSURANCE_LIFE_AND_ANNUITY';
    const INSURANCE_SALES_UNDERWRITING = 'INSURANCE_SALES_UNDERWRITING';
    const INSURANCE_UNDERWRITING_PREMIUMS = 'INSURANCE_UNDERWRITING_PREMIUMS';
    const INTERNET_AND_NETWORK_SERVICES = 'INTERNET_AND_NETWORK_SERVICES';
    const INTRA_COMPANY_PURCHASES = 'INTRA_COMPANY_PURCHASES';
    const LABORATORIES_DENTAL_MEDICAL = 'LABORATORIES_DENTAL_MEDICAL';
    const LANDSCAPING = 'LANDSCAPING';
    const LANDSCAPING_AND_HORTICULTURAL_SERVICES = 'LANDSCAPING_AND_HORTICULTURAL_SERVICES';
    const LAUNDRY_CLEANING_SERVICES = 'LAUNDRY_CLEANING_SERVICES';
    const LEGAL = 'LEGAL';
    const LEGAL_SERVICES_AND_ATTORNEYS = 'LEGAL_SERVICES_AND_ATTORNEYS';
    const LOCAL_DELIVERY_SERVICE = 'LOCAL_DELIVERY_SERVICE';
    const LOCKSMITH = 'LOCKSMITH';
    const LODGING_AND_ACCOMMODATIONS = 'LODGING_AND_ACCOMMODATIONS';
    const LOTTERY_AND_CONTESTS = 'LOTTERY_AND_CONTESTS';
    const LUGGAGE_AND_LEATHER_GOODS = 'LUGGAGE_AND_LEATHER_GOODS';
    const LUMBER_AND_BUILDING_MATERIALS = 'LUMBER_AND_BUILDING_MATERIALS';
    const MAGAZINES = 'MAGAZINES';
    const MAINTENANCE_AND_REPAIR_SERVICES = 'MAINTENANCE_AND_REPAIR_SERVICES';
    const MAKEUP_AND_COSMETICS = 'MAKEUP_AND_COSMETICS';
    const MANUAL_CASH_DISBURSEMENTS = 'MANUAL_CASH_DISBURSEMENTS';
    const MASSAGE_PARLORS = 'MASSAGE_PARLORS';
    const MEDICAL = 'MEDICAL';
    const MEDICAL_AND_PHARMACEUTICAL = 'MEDICAL_AND_PHARMACEUTICAL';
    const MEDICAL_CARE = 'MEDICAL_CARE';
    const MEDICAL_EQUIPMENT_AND_SUPPLIES = 'MEDICAL_EQUIPMENT_AND_SUPPLIES';
    const MEDICAL_SERVICES = 'MEDICAL_SERVICES';
    const MEETING_PLANNERS = 'MEETING_PLANNERS';
    const MEMBERSHIP_CLUBS_AND_ORGANIZATIONS = 'MEMBERSHIP_CLUBS_AND_ORGANIZATIONS';
    const MEMBERSHIP_COUNTRY_CLUBS_GOLF = 'MEMBERSHIP_COUNTRY_CLUBS_GOLF';
    const MEMORABILIA = 'MEMORABILIA';
    const MEN_AND_BOY_CLOTHING_AND_ACCESSORY_STORES = 'MEN_AND_BOY_CLOTHING_AND_ACCESSORY_STORES';
    const MEN_CLOTHING = 'MEN_CLOTHING';
    const MERCHANDISE = 'MERCHANDISE';
    const METAPHYSICAL = 'METAPHYSICAL';
    const MILITARIA = 'MILITARIA';
    const MILITARY_AND_CIVIL_SERVICE_UNIFORMS = 'MILITARY_AND_CIVIL_SERVICE_UNIFORMS';
    const MISC = 'MISC';
    const MISCELLANEOUS_GENERAL_SERVICES = 'MISCELLANEOUS_GENERAL_SERVICES';
    const MISCELLANEOUS_REPAIR_SHOPS_AND_RELATED_SERVICES = 'MISCELLANEOUS_REPAIR_SHOPS_AND_RELATED_SERVICES';
    const MODEL_KITS = 'MODEL_KITS';
    const MONEY_TRANSFER_MEMBER_FINANCIAL_INSTITUTION = 'MONEY_TRANSFER_MEMBER_FINANCIAL_INSTITUTION';
    const MONEY_TRANSFER_MERCHANT = 'MONEY_TRANSFER_MERCHANT';
    const MOTION_PICTURE_THEATERS = 'MOTION_PICTURE_THEATERS';
    const MOTOR_FREIGHT_CARRIERS_AND_TRUCKING = 'MOTOR_FREIGHT_CARRIERS_AND_TRUCKING';
    const MOTOR_HOME_AND_RECREATIONAL_VEHICLE_RENTAL = 'MOTOR_HOME_AND_RECREATIONAL_VEHICLE_RENTAL';
    const MOTOR_HOMES_DEALERS = 'MOTOR_HOMES_DEALERS';
    const MOTOR_VEHICLE_SUPPLIES_AND_NEW_PARTS = 'MOTOR_VEHICLE_SUPPLIES_AND_NEW_PARTS';
    const MOTORCYCLE_DEALERS = 'MOTORCYCLE_DEALERS';
    const MOTORCYCLES = 'MOTORCYCLES';
    const MOVIE = 'MOVIE';
    const MOVIE_TICKETS = 'MOVIE_TICKETS';
    const MOVING_AND_STORAGE = 'MOVING_AND_STORAGE';
    const MULTI_LEVEL_MARKETING = 'MULTI_LEVEL_MARKETING';
    const MUSIC_CDS_CASSETTES_AND_ALBUMS = 'MUSIC_CDS_CASSETTES_AND_ALBUMS';
    const MUSIC_STORE_INSTRUMENTS_AND_SHEET_MUSIC = 'MUSIC_STORE_INSTRUMENTS_AND_SHEET_MUSIC';
    const NETWORKING = 'NETWORKING';
    const NEW_AGE = 'NEW_AGE';
    const NEW_PARTS_AND_SUPPLIES_MOTOR_VEHICLE = 'NEW_PARTS_AND_SUPPLIES_MOTOR_VEHICLE';
    const NEWS_DEALERS_AND_NEWSTANDS = 'NEWS_DEALERS_AND_NEWSTANDS';
    const NON_DURABLE_GOODS = 'NON_DURABLE_GOODS';
    const NON_FICTION = 'NON_FICTION';
    const NON_PROFIT_POLITICAL_AND_RELIGION = 'NON_PROFIT_POLITICAL_AND_RELIGION';
    const NONPROFIT = 'NONPROFIT';
    const NOVELTIES = 'NOVELTIES';
    const OEM_SOFTWARE = 'OEM_SOFTWARE';
    const OFFICE_SUPPLIES_AND_EQUIPMENT = 'OFFICE_SUPPLIES_AND_EQUIPMENT';
    const ONLINE_DATING = 'ONLINE_DATING';
    const ONLINE_GAMING = 'ONLINE_GAMING';
    const ONLINE_GAMING_CURRENCY = 'ONLINE_GAMING_CURRENCY';
    const ONLINE_SERVICES = 'ONLINE_SERVICES';
    const OOUTBOUND_TELEMARKETING_MERCH = 'OOUTBOUND_TELEMARKETING_MERCH';
    const OPHTHALMOLOGISTS_OPTOMETRIST = 'OPHTHALMOLOGISTS_OPTOMETRIST';
    const OPTICIANS_AND_DISPENSING = 'OPTICIANS_AND_DISPENSING';
    const ORTHOPEDIC_GOODS_PROSTHETICS = 'ORTHOPEDIC_GOODS_PROSTHETICS';
    const OSTEOPATHS = 'OSTEOPATHS';
    const OTHER = 'OTHER';
    const PACKAGE_TOUR_OPERATORS = 'PACKAGE_TOUR_OPERATORS';
    const PAINTBALL = 'PAINTBALL';
    const PAINTS_VARNISHES_AND_SUPPLIES = 'PAINTS_VARNISHES_AND_SUPPLIES';
    const PARKING_LOTS_AND_GARAGES = 'PARKING_LOTS_AND_GARAGES';
    const PARTS_AND_ACCESSORIES = 'PARTS_AND_ACCESSORIES';
    const PAWN_SHOPS = 'PAWN_SHOPS';
    const PAYCHECK_LENDER_OR_CASH_ADVANCE = 'PAYCHECK_LENDER_OR_CASH_ADVANCE';
    const PERIPHERALS = 'PERIPHERALS';
    const PERSONALIZED_GIFTS = 'PERSONALIZED_GIFTS';
    const PET_SHOPS_PET_FOOD_AND_SUPPLIES = 'PET_SHOPS_PET_FOOD_AND_SUPPLIES';
    const PETROLEUM_AND_PETROLEUM_PRODUCTS = 'PETROLEUM_AND_PETROLEUM_PRODUCTS';
    const PETS_AND_ANIMALS = 'PETS_AND_ANIMALS';
    const PHOTOFINISHING_LABORATORIES_PHOTO_DEVELOPING = 'PHOTOFINISHING_LABORATORIES_PHOTO_DEVELOPING';
    const PHOTOGRAPHIC_STUDIOS_PORTRAITS = 'PHOTOGRAPHIC_STUDIOS_PORTRAITS';
    const PHOTOGRAPHY = 'PHOTOGRAPHY';
    const PHYSICAL_GOOD = 'PHYSICAL_GOOD';
    const PICTURE_VIDEO_PRODUCTION = 'PICTURE_VIDEO_PRODUCTION';
    const PIECE_GOODS_NOTIONS_AND_OTHER_DRY_GOODS = 'PIECE_GOODS_NOTIONS_AND_OTHER_DRY_GOODS';
    const PLANTS_AND_SEEDS = 'PLANTS_AND_SEEDS';
    const PLUMBING_AND_HEATING_EQUIPMENTS_AND_SUPPLIES = 'PLUMBING_AND_HEATING_EQUIPMENTS_AND_SUPPLIES';
    const POLICE_RELATED_ITEMS = 'POLICE_RELATED_ITEMS';
    const POLITICAL_ORGANIZATIONS = 'POLITICAL_ORGANIZATIONS';
    const POSTAL_SERVICES_GOVERNMENT_ONLY = 'POSTAL_SERVICES_GOVERNMENT_ONLY';
    const POSTERS = 'POSTERS';
    const PREPAID_AND_STORED_VALUE_CARDS = 'PREPAID_AND_STORED_VALUE_CARDS';
    const PRESCRIPTION_DRUGS = 'PRESCRIPTION_DRUGS';
    const PROMOTIONAL_ITEMS = 'PROMOTIONAL_ITEMS';
    const PUBLIC_WAREHOUSING_AND_STORAGE = 'PUBLIC_WAREHOUSING_AND_STORAGE';
    const PUBLISHING_AND_PRINTING = 'PUBLISHING_AND_PRINTING';
    const PUBLISHING_SERVICES = 'PUBLISHING_SERVICES';
    const RADAR_DECTORS = 'RADAR_DECTORS';
    const RADIO_TELEVISION_AND_STEREO_REPAIR = 'RADIO_TELEVISION_AND_STEREO_REPAIR';
    const REAL_ESTATE = 'REAL_ESTATE';
    const REAL_ESTATE_AGENT = 'REAL_ESTATE_AGENT';
    const REAL_ESTATE_AGENTS_AND_MANAGERS_RENTALS = 'REAL_ESTATE_AGENTS_AND_MANAGERS_RENTALS';
    const RELIGION_AND_SPIRITUALITY_FOR_PROFIT = 'RELIGION_AND_SPIRITUALITY_FOR_PROFIT';
    const RELIGIOUS = 'RELIGIOUS';
    const RELIGIOUS_ORGANIZATIONS = 'RELIGIOUS_ORGANIZATIONS';
    const REMITTANCE = 'REMITTANCE';
    const RENTAL_PROPERTY_MANAGEMENT = 'RENTAL_PROPERTY_MANAGEMENT';
    const RESIDENTIAL = 'RESIDENTIAL';
    const RETAIL = 'RETAIL';
    const RETAIL_FINE_JEWELRY_AND_WATCHES = 'RETAIL_FINE_JEWELRY_AND_WATCHES';
    const REUPHOLSTERY_AND_FURNITURE_REPAIR = 'REUPHOLSTERY_AND_FURNITURE_REPAIR';
    const RINGS = 'RINGS';
    const ROOFING_SIDING_SHEET_METAL = 'ROOFING_SIDING_SHEET_METAL';
    const RUGS_AND_CARPETS = 'RUGS_AND_CARPETS';
    const SCHOOLS_AND_COLLEGES = 'SCHOOLS_AND_COLLEGES';
    const SCIENCE_FICTION = 'SCIENCE_FICTION';
    const SCRAPBOOKING = 'SCRAPBOOKING';
    const SCULPTURES = 'SCULPTURES';
    const SECURITIES_BROKERS_AND_DEALERS = 'SECURITIES_BROKERS_AND_DEALERS';
    const SECURITY_AND_SURVEILLANCE = 'SECURITY_AND_SURVEILLANCE';
    const SECURITY_AND_SURVEILLANCE_EQUIPMENT = 'SECURITY_AND_SURVEILLANCE_EQUIPMENT';
    const SECURITY_BROKERS_AND_DEALERS = 'SECURITY_BROKERS_AND_DEALERS';
    const SEMINARS = 'SEMINARS';
    const SERVICE_STATIONS = 'SERVICE_STATIONS';
    const SERVICES = 'SERVICES';
    const SEWING_NEEDLEWORK_FABRIC_AND_PIECE_GOODS_STORES = 'SEWING_NEEDLEWORK_FABRIC_AND_PIECE_GOODS_STORES';
    const SHIPPING_AND_PACKING = 'SHIPPING_AND_PACKING';
    const SHOE_REPAIR_HAT_CLEANING = 'SHOE_REPAIR_HAT_CLEANING';
    const SHOE_STORES = 'SHOE_STORES';
    const SHOES = 'SHOES';
    const SNOWMOBILE_DEALERS = 'SNOWMOBILE_DEALERS';
    const SOFTWARE = 'SOFTWARE';
    const SPECIALTY_AND_MISC = 'SPECIALTY_AND_MISC';
    const SPECIALTY_CLEANING_POLISHING_AND_SANITATION_PREPARATIONS = 'SPECIALTY_CLEANING_POLISHING_AND_SANITATION_PREPARATIONS';
    const SPECIALTY_OR_RARE_PETS = 'SPECIALTY_OR_RARE_PETS';
    const SPORT_GAMES_AND_TOYS = 'SPORT_GAMES_AND_TOYS';
    const SPORTING_AND_RECREATIONAL_CAMPS = 'SPORTING_AND_RECREATIONAL_CAMPS';
    const SPORTING_GOODS = 'SPORTING_GOODS';
    const SPORTS_AND_OUTDOORS = 'SPORTS_AND_OUTDOORS';
    const SPORTS_AND_RECREATION = 'SPORTS_AND_RECREATION';
    const STAMP_AND_COIN = 'STAMP_AND_COIN';
    const STATIONARY_PRINTING_AND_WRITING_PAPER = 'STATIONARY_PRINTING_AND_WRITING_PAPER';
    const STENOGRAPHIC_AND_SECRETARIAL_SUPPORT_SERVICES = 'STENOGRAPHIC_AND_SECRETARIAL_SUPPORT_SERVICES';
    const STOCKS_BONDS_SECURITIES_AND_RELATED_CERTIFICATES = 'STOCKS_BONDS_SECURITIES_AND_RELATED_CERTIFICATES';
    const STORED_VALUE_CARDS = 'STORED_VALUE_CARDS';
    const SUPPLIES = 'SUPPLIES';
    const SUPPLIES_AND_TOYS = 'SUPPLIES_AND_TOYS';
    const SURVEILLANCE_EQUIPMENT = 'SURVEILLANCE_EQUIPMENT';
    const SWIMMING_POOLS_AND_SPAS = 'SWIMMING_POOLS_AND_SPAS';
    const SWIMMING_POOLS_SALES_SUPPLIES_SERVICES = 'SWIMMING_POOLS_SALES_SUPPLIES_SERVICES';
    const TAILORS_AND_ALTERATIONS = 'TAILORS_AND_ALTERATIONS';
    const TAX_PAYMENTS = 'TAX_PAYMENTS';
    const TAX_PAYMENTS_GOVERNMENT_AGENCIES = 'TAX_PAYMENTS_GOVERNMENT_AGENCIES';
    const TAXICABS_AND_LIMOUSINES = 'TAXICABS_AND_LIMOUSINES';
    const TELECOMMUNICATION_SERVICES = 'TELECOMMUNICATION_SERVICES';
    const TELEPHONE_CARDS = 'TELEPHONE_CARDS';
    const TELEPHONE_EQUIPMENT = 'TELEPHONE_EQUIPMENT';
    const TELEPHONE_SERVICES = 'TELEPHONE_SERVICES';
    const THEATER = 'THEATER';
    const TIRE_RETREADING_AND_REPAIR = 'TIRE_RETREADING_AND_REPAIR';
    const TOLL_OR_BRIDGE_FEES = 'TOLL_OR_BRIDGE_FEES';
    const TOOLS_AND_EQUIPMENT = 'TOOLS_AND_EQUIPMENT';
    const TOURIST_ATTRACTIONS_AND_EXHIBITS = 'TOURIST_ATTRACTIONS_AND_EXHIBITS';
    const TOWING_SERVICE = 'TOWING_SERVICE';
    const TOYS_AND_GAMES = 'TOYS_AND_GAMES';
    const TRADE_AND_VOCATIONAL_SCHOOLS = 'TRADE_AND_VOCATIONAL_SCHOOLS';
    const TRADEMARK_INFRINGEMENT = 'TRADEMARK_INFRINGEMENT';
    const TRAILER_PARKS_AND_CAMPGROUNDS = 'TRAILER_PARKS_AND_CAMPGROUNDS';
    const TRAINING_SERVICES = 'TRAINING_SERVICES';
    const TRANSPORTATION_SERVICES = 'TRANSPORTATION_SERVICES';
    const TRAVEL = 'TRAVEL';
    const TRUCK_AND_UTILITY_TRAILER_RENTALS = 'TRUCK_AND_UTILITY_TRAILER_RENTALS';
    const TRUCK_STOP = 'TRUCK_STOP';
    const TYPESETTING_PLATE_MAKING_AND_RELATED_SERVICES = 'TYPESETTING_PLATE_MAKING_AND_RELATED_SERVICES';
    const USED_MERCHANDISE_AND_SECONDHAND_STORES = 'USED_MERCHANDISE_AND_SECONDHAND_STORES';
    const USED_PARTS_MOTOR_VEHICLE = 'USED_PARTS_MOTOR_VEHICLE';
    const UTILITIES = 'UTILITIES';
    const UTILITIES_ELECTRIC_GAS_WATER_SANITARY = 'UTILITIES_ELECTRIC_GAS_WATER_SANITARY';
    const VARIETY_STORES = 'VARIETY_STORES';
    const VEHICLE_SALES = 'VEHICLE_SALES';
    const VEHICLE_SERVICE_AND_ACCESSORIES = 'VEHICLE_SERVICE_AND_ACCESSORIES';
    const VIDEO_EQUIPMENT = 'VIDEO_EQUIPMENT';
    const VIDEO_GAME_ARCADES_ESTABLISH = 'VIDEO_GAME_ARCADES_ESTABLISH';
    const VIDEO_GAMES_AND_SYSTEMS = 'VIDEO_GAMES_AND_SYSTEMS';
    const VIDEO_TAPE_RENTAL_STORES = 'VIDEO_TAPE_RENTAL_STORES';
    const VINTAGE_AND_COLLECTIBLE_VEHICLES = 'VINTAGE_AND_COLLECTIBLE_VEHICLES';
    const VINTAGE_AND_COLLECTIBLES = 'VINTAGE_AND_COLLECTIBLES';
    const VITAMINS_AND_SUPPLEMENTS = 'VITAMINS_AND_SUPPLEMENTS';
    const VOCATIONAL_AND_TRADE_SCHOOLS = 'VOCATIONAL_AND_TRADE_SCHOOLS';
    const WATCH_CLOCK_AND_JEWELRY_REPAIR = 'WATCH_CLOCK_AND_JEWELRY_REPAIR';
    const WEB_HOSTING_AND_DESIGN = 'WEB_HOSTING_AND_DESIGN';
    const WELDING_REPAIR = 'WELDING_REPAIR';
    const WHOLESALE_CLUBS = 'WHOLESALE_CLUBS';
    const WHOLESALE_FLORIST_SUPPLIERS = 'WHOLESALE_FLORIST_SUPPLIERS';
    const WHOLESALE_PRESCRIPTION_DRUGS = 'WHOLESALE_PRESCRIPTION_DRUGS';
    const WILDLIFE_PRODUCTS = 'WILDLIFE_PRODUCTS';
    const WIRE_TRANSFER = 'WIRE_TRANSFER';
    const WIRE_TRANSFER_AND_MONEY_ORDER = 'WIRE_TRANSFER_AND_MONEY_ORDER';
    const WOMEN_ACCESSORY_SPECIALITY = 'WOMEN_ACCESSORY_SPECIALITY';
    const WOMEN_CLOTHING = 'WOMEN_CLOTHING';

    public function __invoke(): array
    {
        $categories = [];

        $reflection = new \ReflectionClass(__CLASS__);
        $constants = $reflection->getConstants();

        foreach ($constants as $constant)
        {
            $categories[] = $constant;
        }

        return $categories;
    }

    /**
     * @param string $category
     * @return bool
     * @throws InvalidProductCategoryException
     */
    public static function validateCategory(string $category): bool
    {
        $categories = (new self())();
        if (in_array($category, $categories)) return true;

        throw new InvalidProductCategoryException($category);
    }
}
