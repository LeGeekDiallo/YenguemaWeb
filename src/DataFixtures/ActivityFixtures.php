<?php

namespace App\DataFixtures;

use App\Entity\Activity;
use App\Entity\ActivityImage;
use App\Entity\AdditionalSurfaces;
use App\Entity\AdImages;
use App\Entity\Ads;
use App\Entity\Apartment;
use App\Entity\ApartmentImages;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Provider\DateTime;

class ActivityFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $cities = array("Conakry", "Boké", "KanKan", "Labé", "Mamou", "Kinka", "Faranah", "Guékedou", "N'Zérékoré");
        $munic = array("Ratoma", "Matoto", "Dixinn", "Kaloum", "Matam", "Kinka", "Gaoual", "Boké", "N'Zérékoré", "Koundara", "Koubia");
        $address = array("Ratoma", "Bambeto", "Kipé", "Nongo", "Hafia", "Hamdanlaye", "Madina", "Sonfonya", "Centre-Emetteur");
        $category = array("Artisanat", "Boulangerie", "Blanchisseur", "Boutique", "Briqueterie", "Commerces", "Cordonerie",
            "Cosmetique", "Couture", "Garage Auto", "Maçonnerie", "Menuiserie");
        $annex = ["balcon", "terrasse", "garage", "parking"];
        $pn = ["664253212", "664152212", "620254516", "662253202"];
        $furniture = [true, false];
        $propType = ["A vendre", "A louer"];
        $ad_cat = [
            'accessoires',
            'chaussures',
            'cosmétique',
            'document-livres-brochures',
            'electronique',
            'electroménager',
            'interieur-maison',
            'motos',
            'loisir',
            'multimédia',
            'vélos',
            'vêtements',
            'véhicules',
        ];
        $type = [
            'Bijoux',
            'Casquettes-chapeaux',
            'Ceintures',
            'Chaussettes',
            'Cravates',
            'Echarpes',
            'Gants',
            'Lunettes de soleil',
            'Masques en tissu',
            'Montres',
            'Portefeuilles',
            'Sacs'
        ];
        $brand = ['ALFA ROMEO',
            'BMW',
            'CHEVROLET',
            'CHRYSLER',
            'CITROEN',
            'DACIA',
            'DODGE',
            'FIAT',
            'FORD',
            'HONDA' ,
            'HUMMER',
            'HYUNDAI',
            'JAGUAR',
            'JEEP',
            'LAND ROVER',
            'LEXUS',
            'LOTUS',
            'MAZDA',
            'MERCEDES–BENZ',
            'MITSUBISHI',
            'NISSAN',
            'OPEL',
            'PEUGEOT',
            'RENAULT',
            'SKODA',
            'SUZUKI',
            'TOYOTA',
            'VOLKSWAGEN'];
        $v_type = [
                'Diesel',
                'Electrique',
                'Essence',
                'Hybride',
            ];
        $images = array("3fbeadec6122.png", "04cedf015dde.png", "1810054fdf2e.png", "a8e06f205f4e.jpg");
        $ads_img = array("0d6849f744f5.jpg", "0ffd0201fdb3.png", "1f76522677e7.jpg", "7b3ff9f06141.jpg", "07385582188b.jpg",
            "a32d660803f9.jpg", "b04d0a8fff39.jpg");
        $states = [
            "Neuf",
            "Très bon état",
            "Bon état",
            "Occasion",
            "Longtemps servit"
        ];
        for($i=0; $i<200; $i++){
            $user = new User();
            $activity = new Activity();
            $user->setSexe(mt_rand(0, 2))
                ->setUsername($faker->name())
                ->setEmail($faker->email())
                ->setPassword($faker->password())
                ->setPhoneNumber('664253212')
                ->setSubscribeAt($faker->dateTime($max = 'now', $timezone = null))
                ->setRoles($user->getRoles());
            $activity->setActivityName($faker->sentence(mt_rand(1, 5)))
                ->setCategory($category[mt_rand(0, count($category)-1)])
                ->setEmail($faker->email())
                ->setPhoneNumber("666253212")
                ->setCity($cities[mt_rand(0, count($cities)-1)])
                ->setMunicipality($munic[mt_rand(0, count($munic)-1)])
                ->setAddress($address[mt_rand(0, count($address)-1)])
                ->setUser($user)
                ->setCreatedAt($faker->dateTime($max = 'now', $timezone = null))
                ->setDetails($faker->paragraph());
            for($im=0; $im<mt_rand(2, 5); $im++){
                $ad_img = new ActivityImage();
                $ad_img->setFilename($ads_img[mt_rand(0, count($ads_img)-1)])
                    ->setUploadAt($faker->dateTimeThisMonth());
                $activity->addActivityImage($ad_img);
            }
            $manager->persist($activity);
            for($ad_i=0; $ad_i<mt_rand(4, 6); $ad_i++){
                $ad = new Ads();
                $cat = $ad_cat[mt_rand(0, count($ad_cat)-1)];
                $ad->setUser($user)
                    ->setAdTitle($faker->sentence(mt_rand(1, 3), true))
                    ->setAdPrice($faker->numberBetween(50000, 250000000))
                    ->setAdCategory($cat)
                    ->setAdType($type[mt_rand(0, count($type)-1)])
                    ->setAdState($states[mt_rand(0, count($states)-1)]);
                if($cat === "motos" || $cat === "vélos" || $cat === "véhicules"){
                    $ad->setBrand($brand[mt_rand(0, count($brand)-1)])
                        ->setModel($faker->sentence(1))
                        ->setMileage($faker->numberBetween(15000, 250000))
                        ->setVehicleType($v_type[mt_rand(0, count($v_type)-1)])
                        ->setYear($faker->year('now'));
                }
                $ad->setCity($cities[mt_rand(0, count($cities)-1)])
                    ->setMunicipality($munic[mt_rand(0, count($munic)-1)])
                    ->setAddress($address[mt_rand(0, count($address)-1)])
                    ->setEmail($faker->email)
                    ->setPhoneNumber("666253212")
                    ->setDetails($faker->paragraph())
                    ->setCreatedAt($faker->dateTimeThisMonth());
                for($im=0; $im<mt_rand(2, 5); $im++){
                    $ad_img = new AdImages();
                    $ad_img->setImageName($ads_img[mt_rand(0, count($ads_img)-1)])
                        ->setUploadAt($faker->dateTimeThisMonth());
                    $ad->addAdPhoto($ad_img);
                }
                $manager->persist($ad);
            }
            for($apart = 0; $apart<mt_rand(4, 16); $apart++){
                $aprt = new Apartment();
                $date = $faker->dateTimeInInterval('now', '+ 5 days', null);
                $aprt->setPropertyType('Appartement')
                    ->setUser($user)
                    ->setPropertySurface(mt_rand(20, 200))
                    ->setAppartFloor(mt_rand(2, 10))
                    ->setAdTitle($faker->sentence(mt_rand(1, 2), true))
                    ->setRoomNumber(mt_rand(2, 5))
                    ->setBathroomNumber(mt_rand(2, 5))
                    ->setWcNumber(mt_rand(1, 3))
                    ->setFurniture($furniture[mt_rand(0, 1)])
                    ->setPropositionType($propType[mt_rand(0, 1)])
                    ->setPrice($faker->numberBetween(50000, 250000000))
                    ->setCity($cities[mt_rand(0, count($cities)-1)])
                    ->setMunicipality($address[mt_rand(0, count($address)-1)])
                    ->setDistrict($faker->sentence(1))
                    ->setMoreDetailsAddress($faker->paragraph())
                    ->setOtherInfos($faker->paragraph(3, true))
                    ->setCreatedAt(new \DateTime('now'))
                    ->setPhoneNumber($pn[mt_rand(0, count($pn)-1)])
                    ->setEmail($faker->email)
                    ->setEquipements($faker->paragraph());
                for($im=0; $im<mt_rand(5, 15); $im++){
                    $ad_img = new ApartmentImages();
                    $ad_img->setFilename($ads_img[mt_rand(0, count($ads_img)-1)])
                        ->setUpdateAt(new \DateTime('now'));
                    $aprt->addApartmentImage($ad_img);
                }

                for($im=0; $im<mt_rand(5, 15); $im++){
                    $addS = new AdditionalSurfaces();
                    $addS->setAdditionalSurfaceName($faker->sentence(1));
                    $aprt->addAdditionalSurface($addS);
                }
                $manager->persist($aprt);
            }
            $manager->persist($user);

        }
        $manager->flush();
    }
}
