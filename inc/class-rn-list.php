<?php

// If this file is called directly, abort!
defined( 'ABSPATH' ) || exit;

class RN_List {

    // Object instance
    public static $instance;

    /**
     * Make an instance of the class
     *
     * @since 1.0
     */
    public function rn_get_instance() {

        if( null == self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;

    }

    /**
     * Setting up names
     *
     * @since 1.0
     */
    public function rn_set_names() {

        $rn_names = array(
        'Alex'        => __( 'Protector of humanity. Origin : Greek', 'rand-name' ),
        'Arthur'        => __( 'As strong as a bear. Origin : Gaelic', 'rand-name' ),
        'Ana'        => __( 'Gracious, merciful. Origin : Hebrew', 'rand-name' ),
        'Allison'        => __( 'Noble, graceful. Origin : French', 'rand-name' ),
        'Arlene'        => __( 'Oath. Origin : Gaelic', 'rand-name' ),
        'Alberto'        => __( 'Aristocratic and bright. Origin : Germanic, Italian, Portuguese, Spanish', 'rand-name' ),
    /*    'Barry'        => __( 'text', 'rand-name' ),
        'Bertha'        => __( 'text', 'rand-name' ),
        'Bill'        => __( 'text', 'rand-name' ),
        'Bonnie'        => __( 'text', 'rand-name' ),
        'Bret'        => __( 'text', 'rand-name' ),
        'Beryl'        => __( 'text', 'rand-name' ),
        'Chantal'        => __( 'text', 'rand-name' ),
        'Cristobal'        => __( 'text', 'rand-name' ),
        'Claudette'        => __( 'text', 'rand-name' ),
        'Charley'        => __( 'text', 'rand-name' ),
        'Cindy'        => __( 'text', 'rand-name' ),
        'Chris'        => __( 'text', 'rand-name' ),
        'Dean'        => __( 'text', 'rand-name' ),
        'Dolly'        => __( 'text', 'rand-name' ),
        'Danny'        => __( 'text', 'rand-name' ),
        'Danielle'        => __( 'text', 'rand-name' ),
        'Dennis'        => __( 'text', 'rand-name' ),
        'Debby'        => __( 'text', 'rand-name' ),
        'Erin'        => __( 'text', 'rand-name' ),
        'Edouard'        => __( 'text', 'rand-name' ),
        'Erika'        => __( 'text', 'rand-name' ),
        'Earl'        => __( 'text', 'rand-name' ),
        'Emily'        => __( 'text', 'rand-name' ),
        'Ernesto'        => __( 'text', 'rand-name' ),
        'Felix'        => __( 'text', 'rand-name' ),
        'Fay'        => __( 'text', 'rand-name' ),
        'Fabian'        => __( 'text', 'rand-name' ),
        'Frances'        => __( 'text', 'rand-name' ),
        'Franklin'        => __( 'text', 'rand-name' ),
        'Florence'        => __( 'text', 'rand-name' ),
        'Gabielle'        => __( 'text', 'rand-name' ),
        'Gustav'        => __( 'text', 'rand-name' ),
        'Grace'        => __( 'text', 'rand-name' ),
        'Gaston'        => __( 'text', 'rand-name' ),
        'Gert'        => __( 'text', 'rand-name' ),
        'Gordon'        => __( 'text', 'rand-name' ),
        'Humberto'        => __( 'text', 'rand-name' ),
        'Hanna'        => __( 'text', 'rand-name' ),
        'Henri'        => __( 'text', 'rand-name' ),
        'Hermine'        => __( 'text', 'rand-name' ),
        'Harvey'        => __( 'text', 'rand-name' ),
        'Helene'        => __( 'text', 'rand-name' ),
        'Iris'        => __( 'text', 'rand-name' ),
        'Isidore'        => __( 'text', 'rand-name' ),
        'Isabel'        => __( 'text', 'rand-name' ),
        'Ivan'        => __( 'text', 'rand-name' ),
        'Irene'        => __( 'text', 'rand-name' ),
        'Isaac'        => __( 'text', 'rand-name' ),
        'Jerry'        => __( 'text', 'rand-name' ),
        'Josephine'        => __( 'text', 'rand-name' ),
        'Juan'        => __( 'text', 'rand-name' ),
        'Jeanne'        => __( 'text', 'rand-name' ),
        'Jose'        => __( 'text', 'rand-name' ),
        'Joyce'        => __( 'text', 'rand-name' ),
        'Karen'        => __( 'text', 'rand-name' ),
        'Kyle'        => __( 'text', 'rand-name' ),
        'Kate'        => __( 'text', 'rand-name' ),
        'Karl'        => __( 'text', 'rand-name' ),
        'Katrina'        => __( 'text', 'rand-name' ),
        'Kirk'        => __( 'text', 'rand-name' ),
        'Lorenzo'        => __( 'text', 'rand-name' ),
        'Lili'        => __( 'text', 'rand-name' ),
        'Larry'        => __( 'text', 'rand-name' ),
        'Lisa'        => __( 'text', 'rand-name' ),
        'Lee'        => __( 'text', 'rand-name' ),
        'Leslie'        => __( 'text', 'rand-name' ),
        'Michelle'        => __( 'text', 'rand-name' ),
        'Marco'        => __( 'text', 'rand-name' ),
        'Mindy'        => __( 'text', 'rand-name' ),
        'Maria'        => __( 'text', 'rand-name' ),
        'Michael'        => __( 'text', 'rand-name' ),
        'Noel'        => __( 'text', 'rand-name' ),
        'Nana'        => __( 'text', 'rand-name' ),
        'Nicholas'        => __( 'text', 'rand-name' ),
        'Nicole'        => __( 'text', 'rand-name' ),
        'Nate'        => __( 'text', 'rand-name' ),
        'Nadine'        => __( 'text', 'rand-name' ),
        'Olga'        => __( 'text', 'rand-name' ),
        'Omar'        => __( 'text', 'rand-name' ),
        'Odette'        => __( 'text', 'rand-name' ),
        'Otto'        => __( 'text', 'rand-name' ),
        'Ophelia'        => __( 'text', 'rand-name' ),
        'Oscar'        => __( 'text', 'rand-name' ),
        'Pablo'        => __( 'text', 'rand-name' ),
        'Paloma'        => __( 'text', 'rand-name' ),
        'Peter'        => __( 'text', 'rand-name' ),
        'Paula'        => __( 'text', 'rand-name' ),
        'Philippe'        => __( 'text', 'rand-name' ),
        'Patty'        => __( 'text', 'rand-name' ),
        'Rebekah'        => __( 'text', 'rand-name' ),
        'Rene'        => __( 'text', 'rand-name' ),
        'Rose'        => __( 'text', 'rand-name' ),
        'Richard'        => __( 'text', 'rand-name' ),
        'Rita'        => __( 'text', 'rand-name' ),
        'Rafael'        => __( 'text', 'rand-name' ),
        'Sebastien'        => __( 'text', 'rand-name' ),
        'Sally'        => __( 'text', 'rand-name' ),
        'Sam'        => __( 'text', 'rand-name' ),
        'Shary'        => __( 'text', 'rand-name' ),
        'Stan'        => __( 'text', 'rand-name' ),
        'Sandy'        => __( 'text', 'rand-name' ),
        'Tanya'        => __( 'text', 'rand-name' ),
        'Teddy'        => __( 'text', 'rand-name' ),
        'Teresa'        => __( 'text', 'rand-name' ),
        'Tomas'        => __( 'text', 'rand-name' ),
        'Tammy'        => __( 'text', 'rand-name' ),
        'Tony'        => __( 'text', 'rand-name' ),
        'Van'        => __( 'text', 'rand-name' ),
        'Vicky'        => __( 'text', 'rand-name' ),
        'Victor'        => __( 'text', 'rand-name' ),
        'Virginie'        => __( 'text', 'rand-name' ),
        'Vince'        => __( 'text', 'rand-name' ),
        'Valerie'        => __( 'text', 'rand-name' ),
        'Wendy'        => __( 'text', 'rand-name' ),
        'Wilfred'        => __( 'text', 'rand-name' ),
        'Wanda'        => __( 'text', 'rand-name' ),
        'Walter'        => __( 'text', 'rand-name' ),
        'Wilma'        => __( 'text', 'rand-name' ),
        'William'        => __( 'text', 'rand-name' ),
        'Kumiko'        => __( 'text', 'rand-name' ),
        'Aki'        => __( 'text', 'rand-name' ),
        'Miharu'        => __( 'text', 'rand-name' ),
        'Chiaki'        => __( 'text', 'rand-name' ),
        'Michiyo'        => __( 'text', 'rand-name' ),
        'Itoe'        => __( 'text', 'rand-name' ),
        'Nanaho'        => __( 'text', 'rand-name' ),
        'Reina'        => __( 'text', 'rand-name' ),
        'Emi'        => __( 'text', 'rand-name' ),
        'Yumi'        => __( 'text', 'rand-name' ),
        'Ayumi'        => __( 'text', 'rand-name' ),
        'Kaori'        => __( 'text', 'rand-name' ),
        'Sayuri'        => __( 'text', 'rand-name' ),
        'Rie'        => __( 'text', 'rand-name' ),
        'Miyuki'        => __( 'text', 'rand-name' ),
        'Hitomi'        => __( 'text', 'rand-name' ),
        'Naoko'        => __( 'text', 'rand-name' ),
        'Miwa'        => __( 'text', 'rand-name' ),
        'Etsuko'        => __( 'text', 'rand-name' ),
        'Akane'        => __( 'text', 'rand-name' ),
        'Kazuko'        => __( 'text', 'rand-name' ),
        'Miyako'        => __( 'text', 'rand-name' ),
        'Youko'        => __( 'text', 'rand-name' ),
        'Sachiko'        => __( 'text', 'rand-name' ),
        'Mieko'        => __( 'text', 'rand-name' ),
        'Toshie'        => __( 'text', 'rand-name' ),
        'Junko'        => __( 'text', 'rand-name' ),*/
        );
        return $rn_names;

    }
}
