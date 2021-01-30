        <?php
        class Color
        {
            private $red;
            private $green;
            private $blue;

            public function __construct($red, $green, $blue)
            {
                $this->red = $red;
                $this->green = $green;
                $this->blue = $blue;
            }

            public function getRed()
            {
                return $this->red;
            }

            private function setRed($red)
            {
                $this->red = $red;
                if (!is_int($red)){
                    throw new Exception('Invalid integer');
                }
                elseif (($red<0) || ($red>255)){
                    throw new Exception('Number must be from 0 to 255');
                }
            }

            public function getGreen()
            {
                return $this->green;
            }

            private function setGreen($green)
            {
                $this->green = $green;
                if (!is_int($green)){
                    throw new Exception('Invalid integer');
                }
                elseif (($green<0) || ($green>255)){
                    throw new Exception('Number must be from 0 to 255');
                }
            }

            public function getBlue()
            {
                return $this->blue;
            }

            private function setBlue($blue)
            {
                $this->blue = $blue;
                if (!is_int($blue)){
                    throw new Exception('Invalid integer');
                }
                elseif (($blue<0) || ($blue>255)){
                    throw new Exception('Number must be from 0 to 255');
                }
            }

            public function equal($colouring)
            {
                if (($this->getRed() == $colouring->getRed()) && ($this->getGreen() == $colouring->getGreen()) && ($this->getBlue() == $colouring->getBlue())) {
                    return true;
                }else {
                    return false;
                }
            }

            public static function randColor($random_color)
            {
                $random_color->setRed(rand(0,255));
                $random_color->setGreen(rand(0,255));
                $random_color->setBlue(rand(0,255));
            }
            public function mixColors($color2)
            {
                $red = intdiv($this->getRed() + $color2->getRed(), 2);
                $green = intdiv($this->getGreen() + $color2->getGreen(), 2);
                $blue = intdiv($this->getBlue() + $color2->getBlue(), 2);

                $mixedColor = new Color(0, 0, 0);

                $mixedColor->setRed($red);
                $mixedColor->setGreen($green);
                $mixedColor->setBlue($blue);

                return($mixedColor);
            }
        }

        $color1 = new Color(255, 96, 255);
        $color2 = new Color(0, 250, 30);

        echo '<p align="center"> Color 1: ('.$color1->getRed().', '.$color1->getGreen().', '.$color1->getBlue().') </p>';
        echo '<br>';
        echo ' <p align="center"> Color 2: ('.$color2->getRed().', '.$color2->getGreen().', '.$color2->getBlue().') </p>';
        echo '<br><br>';

        echo  '<p align="center">  Is this colors equal? </p>';
        if ($color1->equal($color2) == true) {
            echo '<p align="center"> Yes it is (True) </p>'.'<br><br>';
        }else echo '<p align="center"> No it is not (False) </p>'.'<br><br>';

        $rand = new Color(0, 0, 0);
        $rand::randColor($rand);
        echo '<p align="center"> Random Color: ('.$rand->getRed().', '.$rand->getGreen().', '.$rand->getBlue().') </p>';
        echo '<br><br>';

        $mixedColor = $color1->mixColors($color2);
        echo '<p align="center"> Mixed Color: ('.$mixedColor->getRed().', '.$mixedColor->getGreen().', '.$mixedColor->getBlue().')</p>';

        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>RGB Colors</title>
            <style>
                body {
                    background-color: rgb<?='('.$mixedColor->getRed().', '.$mixedColor->getGreen().', '.$mixedColor->getBlue().')'?>;
                }
            </style>
        </head>
        <body>
        <h3>  <p align="center"> I hope everything is correct! </p></h3>
        </body>
        </html>
