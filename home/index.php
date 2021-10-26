<?php
	$heating_Pin = 26;
	$heating_file = "/var/www/html/home/heating_gpio.txt";
    if (isset($_POST['btnon_heating']))
    {
        system("raspi-gpio set {$heating_Pin} op");
        system("raspi-gpio set {$heating_Pin} dh");
		system("raspi-gpio get {$heating_Pin} > {$heating_file}");
		$HEATING_file = fopen("{$heating_file}", "r") or die("Unable to open file!");
        $HEATING_state = fread($HEATING_file,filesize("{$heating_file}")) or die("Unable to read file!");
        fclose($HEATING_file);		
		$BOILER_file = fopen("boiler_gpio.txt", "r") or die("Unable to open file!");
        $BOILER_state = fread($BOILER_file,filesize("boiler_gpio.txt"));
        fclose($BOILER_file);
		$FIRE_file = fopen("fire_gpio.txt", "r") or die("Unable to open file!");
        $FIRE_state = fread($FIRE_file,filesize("fire_gpio.txt"));
        fclose($FIRE_file);
    }
    else if (isset($_POST['btnoff_heating']))
    {
        system("raspi-gpio set {$heating_Pin} op");
        system("raspi-gpio set {$heating_Pin} dl");
        system("raspi-gpio get {$heating_Pin} > {$heating_file}");
		$HEATING_file = fopen("{$heating_file}", "r") or die("Unable to open file!");
        $HEATING_state = fread($HEATING_file,filesize("{$heating_file}")) or die("Unable to read file!");
        fclose($HEATING_file);		
		$BOILER_file = fopen("boiler_gpio.txt", "r") or die("Unable to open file!");
        $BOILER_state = fread($BOILER_file,filesize("boiler_gpio.txt"));
        fclose($BOILER_file);
		$FIRE_file = fopen("fire_gpio.txt", "r") or die("Unable to open file!");
        $FIRE_state = fread($FIRE_file,filesize("fire_gpio.txt"));
        fclose($FIRE_file);
   
    }
    #####################################
    if (isset($_POST['btnon_boiler']))
    {
        system("raspi-gpio set 20 op");
        system("raspi-gpio set 20 dh");
        system("raspi-gpio get 20 > boiler_gpio.txt");
		$HEATING_file = fopen("{$heating_file}", "r") or die("Unable to open file!");
        $HEATING_state = fread($HEATING_file,filesize("{$heating_file}")) or die("Unable to read file!");
        fclose($HEATING_file);		
		$BOILER_file = fopen("boiler_gpio.txt", "r") or die("Unable to open file!");
        $BOILER_state = fread($BOILER_file,filesize("boiler_gpio.txt"));
        fclose($BOILER_file);
		$FIRE_file = fopen("fire_gpio.txt", "r") or die("Unable to open file!");
        $FIRE_state = fread($FIRE_file,filesize("fire_gpio.txt"));
        fclose($FIRE_file);
        
    }
    else if (isset($_POST['btnoff_boiler']))
    {
        system("raspi-gpio set 20 op");
        system("raspi-gpio set 20 dl");
        system("raspi-gpio get 20 > boiler_gpio.txt");
        $HEATING_file = fopen("{$heating_file}", "r") or die("Unable to open file!");
        $HEATING_state = fread($HEATING_file,filesize("{$heating_file}")) or die("Unable to read file!");
        fclose($HEATING_file);		
		$BOILER_file = fopen("boiler_gpio.txt", "r") or die("Unable to open file!");
        $BOILER_state = fread($BOILER_file,filesize("boiler_gpio.txt"));
        fclose($BOILER_file);
		$FIRE_file = fopen("fire_gpio.txt", "r") or die("Unable to open file!");
        $FIRE_state = fread($FIRE_file,filesize("fire_gpio.txt"));
        fclose($FIRE_file);
    }
    #####################################
    if (isset($_POST['btnon_fire']))
    {
        system("raspi-gpio set 21 op");
        system("raspi-gpio set 21 dh");
        system("raspi-gpio get 21 > fire_gpio.txt");
		$HEATING_file = fopen("{$heating_file}", "r") or die("Unable to open file!");
        $HEATING_state = fread($HEATING_file,filesize("{$heating_file}")) or die("Unable to read file!");
        fclose($HEATING_file);		
		$BOILER_file = fopen("boiler_gpio.txt", "r") or die("Unable to open file!");
        $BOILER_state = fread($BOILER_file,filesize("boiler_gpio.txt"));
        fclose($BOILER_file);
		$FIRE_file = fopen("fire_gpio.txt", "r") or die("Unable to open file!");
        $FIRE_state = fread($FIRE_file,filesize("fire_gpio.txt"));
        fclose($FIRE_file);
        
    }
    else if (isset($_POST['btnoff_fire']))
    {
        system("raspi-gpio set 21 op");
        system("raspi-gpio set 21 dl");
        system("raspi-gpio get 21 > fire_gpio.txt");
        $HEATING_file = fopen("{$heating_file}", "r") or die("Unable to open file!");
        $HEATING_state = fread($HEATING_file,filesize("{$heating_file}")) or die("Unable to read file!");
        fclose($HEATING_file);		
		$BOILER_file = fopen("boiler_gpio.txt", "r") or die("Unable to open file!");
        $BOILER_state = fread($BOILER_file,filesize("boiler_gpio.txt"));
        fclose($BOILER_file);
		$FIRE_file = fopen("fire_gpio.txt", "r") or die("Unable to open file!");
        $FIRE_state = fread($FIRE_file,filesize("fire_gpio.txt"));
        fclose($FIRE_file);
    }
    
?>
<html>
<head>
    <link rel="stylesheet" href="stylesheet.css">
</head>
    <body>
        
        <div class="wrapper">
            <div class="container">
                <div class="box">
                Heating Circuit (Pin <?php echo $heating_Pin; ?>)
                <form method="post">
                    <p><button name="btnon_heating">Heating On</button></p>
                    <p><button name="btnoff_heating">Heating Off</button></p>
                </form>
                <?php
                    if (strpos($HEATING_state,'level=1') !== false) {
                        echo "Heating is On";
                    } elseif (strpos($HEATING_state,'level=0') !== false)  {
                        echo "Heating is Off";
                    } else {
                        echo "Please check the heating sensors";
                        echo $HEATING_state;
                    }
                ?>
                </div>

                <div class="box">
                Boiler Circuit (Pin 20)
                <form method="post">
                    <p><button name="btnon_boiler">Boiler On</button></p>
                    <p><button name="btnoff_boiler">Boiler Off</button></p>
                </form>
                <?php
                    if (strpos($BOILER_state,'level=1') !== false) {
                        echo "Boiler is On";
                    } elseif (strpos($BOILER_state,'level=0') !== false)  {
                        echo "Boiler is Off";
                    } else {
                        echo "Please check  the boiler sensors";
                        echo $BOILER_state;
                    }
                ?>
                </div>
                <div class="box">
                Fire Circuit (Pin 21)
                <form method="post">
                    <p><button name="btnon_fire">Fire On</button></p>
                    <p><button name="btnoff_fire">Fire Off</button></p>
                </form>
                <?php
                    if (strpos($FIRE_state,'level=1') !== false) {
                        echo "Fire pump is On";
                    } elseif (strpos($FIRE_state,'level=0') !== false)  {
                        echo "Fire pump is Off";
                    } else {
                        echo "Please check  the fire pump sensors";
                        echo $FIRE_state;
                    }
                ?>
                </div>
				<?PHP
					foreach($_SERVER as $key_name => $key_value) {
					print $key_name . " = " . $key_value . "<br>";
					}
				?>
            </div>
        </div>
    </body>
</html>
