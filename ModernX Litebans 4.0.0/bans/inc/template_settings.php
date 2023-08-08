<?php
    //The name of your site. Used for the title of your website and the copyright name and link preview.
    $site_name = 'ModernX';
    
    //The link of the page. Used for link preview.
    $site_link = 'https://templates.jtgraphics.nl/modernx/bans';
    
    //The title of the page. Used for link preview.
    $site_title = 'ModernX | Bans';
    
    //The descriptin of the page. Used for link preview.
    $site_description = 'This is a showcase of the ModernX bans template';
    
    //The image of the page. Used for link preview.
    $site_image = 'https://templates.jtgraphics.nl/modernx/bans/inc/img/logo.png';
    
    //The theme color of the page (in HEX-colors) of the page. Used for link preview.
    $site_theme_color = '#3549cc';
    
    //set to 'true' to enable darkmode, set to 'false' to disable darkmode.
    $darkmode = 'true';

	//WHether or not the dark/light mode switcher is active.
	$themetoggler = 'true';
    
    //Set to 'true' to enable particles in header, set to 'false' to remove particles
    $particles = 'true';
    
    //Change the primary color of the website. Use any of the predefined colors below or set to 'custom' to use a custom color which you can change in custom.css.
    //Predefined colors: blue, red, green, yellow, purple
    //Set to 'default' if you want to use the default color.
    $main_color = 'default';
    
	//Link to logo image
    $logo_img_url = 'inc/img/logo.png';
    
	//Link to banner image
    $banner_img_link = 'inc/img/background.webp';

	$banner_height = '15vh';

	//Whether or not the discord widget in banner should be active.
	$discord_widget_active = 'true';
    
    //Used to get member count. You can find your Discord Guild ID by right clicking on your server and clicking Copy ID.
    //If the member count isn't working after setting this up, make sure to enable Server Widget in your server settings.
    $discord_guild_ID = '726614793284223027';
    
    //Invite link for your discord server.
    $discord_invite_link = 'https://discord.gg/trBJjKB';

	//Whether or not the server widget in banner should be active.
	$server_widget_active = 'true';
    
    //IP that is shown in the banner.
    $server_IP_banner = 'PLAY.HYPIXEL.NET';
    
    //Ip that is used to get online player count.
    $server_IP = 'play.hypixel.net';

	//Ip that is copied when players click on the IP.
    $server_IP_copy = 'play.hypixel.net';

	//Text that's displayed when 1 player is online.
	$player_online_text_single_start = '';
	$player_online_text_single_end = 'player online';

	//Text that's displayed when multiple players are online.
	$player_online_text_multi_start = '';
	$player_online_text_multi_end = 'player online';
    
    //Links for the top navigation. Please contact me on discord (https://discord.gg/trBJjKB) if you are in need for further instructions.
    $navigation_links=array(
        "Home" => array(
            "name"=>"Home",
            "icon"=>"",
            "href"=>"./",
            "position"=>"left"
        ),
        
        "Forum" => array(
            "name"=>"Forum",
            "icon"=>"",
            "href"=>"./forum",
            "position"=>"left"
        ),
        
        "Store" => array(
            "name"=>"Store",
            "icon"=>"",
            "href"=>"./",
            "position"=>"middle"
        ),
        
        "Vote" => array(
            "name"=>"Vote",
            "icon"=>"",
            "href"=>"./",
            "position"=>"right"
        ),
        
        "Staff" => array(
            "name"=>"Staff",
            "icon"=>"",
            "href"=>"./",
            "position"=>"right"
        ),
    );

	//Whether or not the second navigation will show up. NOTE: items added to second_navigation_links will still show up in mobile sidenav
	$second_navigation_active = 'true';
    
    //Links for the second navigation. Please contact me on discord (https://discord.gg/trBJjKB) if you are in need for further instructions.
    $second_navigation_links=array(
        
        "Home" => array(
            "name"=>"Home",
            "icon"=>"<i class='fas fa-users fa-fw'></i>",
            "href"=>"./",
        ),
        
        "Forum" => array(
            "name"=>"Forum",
            "icon"=>"<i class='fas fa-users fa-fw'></i>",
            "href"=>"./forum",
        ),
        
        "Store" => array(
            "name"=>"Store",
            "icon"=>"<i class='fas fa-users fa-fw'></i>",
            "href"=>"./",
        ),
        
        "Vote" => array(
            "name"=>"Vote",
            "icon"=>"<i class='fas fa-users fa-fw'></i>",
            "href"=>"./",
        ),
        
        "Staff" => array(
            "name"=>"Staff",
            "icon"=>"<i class='fas fa-users fa-fw'></i>",
            "href"=>"./",
        ),
        
    );
    
    //FOOTER
    //Whether or not the footer text is active.
	$footertext_active = 'true';
    
    //Title that is used at the about me section in the footer.
    $footer_title = 'Support us';
    
    //Text that is used at the about me section in the footer.
    $footer_text = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.';
    
    //Title of button on footer text
    $footer_button_title = 'Visit Store';
    
    //Link of button on footer text
    $footer_button_link = 'https://store.jtgraphics.nl';
    
	//Whether or not the footer links are active.
	$footerlinks_active = 'true';
	
    //Title displayed above links in footer
    $footer_links_title = 'Useful links';
    
    //Links for the footer navigation. Please contact me on discord (https://discord.gg/trBJjKB) if you are in need for further instructions.
    $footer_links=array(
        
        "Home"=>"/",
        
        "Forum"=>"./forum",
        
        "Vote"=>"./vote",
        
    );
    
?>