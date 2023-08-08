<?php

class Header {
/**
 * @param $page Page
 */
function __construct($page) {
    $this->page = $page;
}

function navbar($links) {
    $request = $this->page->get_requested_page();
    foreach ($links as $page => $title) {
        $class = "";
        if ($this->page->settings->simple_urls) {
            if ("$request.php" === $page) {
                $class .= " active";
            }
        } else if ((substr($_SERVER['SCRIPT_NAME'], -strlen($page))) === $page) {
            $class .= " active";
        }

        if ($this->page->settings->header_show_totals && isset($this->count[$page])) {
            $title .= ' <span class="' . $this->page->settings->badge_classes . 'flex rounded-xl uppercase px-4 py-1 text-xs font-bold icon">';
            $title .= $this->count[$page];
            $title .= "</span>";
        }
        $page = $this->page->link($page);
        echo "<a class=\"$class nav-link\" href=\"$page\">$title</a>";
    }
}

function print_header() {
$page = $this->page;
$settings = $page->settings;

if ($page->settings->name_link === "index.php") {
    $page->settings->name_link = $page->link("index.php");
}
if ($page->settings->header_show_totals) {
    $t = $page->settings->table;
    $t_bans = $t['bans'];
    $t_mutes = $t['mutes'];
    $t_warnings = $t['warnings'];
    $t_kicks = $t['kicks'];
    $active_query = $page->db->active_query;
    try {
        $sql = "SELECT
            (SELECT COUNT(*) FROM $t_bans $active_query),
            (SELECT COUNT(*) FROM $t_mutes $active_query),
            (SELECT COUNT(*) FROM $t_warnings $active_query),
            (SELECT COUNT(*) FROM $t_kicks $active_query)";

        if ($page->db->verify) {
            $sql .= ",(SELECT build FROM " . $t['config'] . " LIMIT 1)";
        }
        $st = $page->conn->query($sql);

        ($row = $st->fetch(PDO::FETCH_NUM)) or die('Failed to fetch row counts.');
        $st->closeCursor();
        $this->count = array(
            'bans.php'     => $row[0],
            'mutes.php'    => $row[1],
            'warnings.php' => $row[2],
            'kicks.php'    => $row[3],
        );
    } catch (PDOException $ex) {
        $page->db->handle_error($page->settings, $ex);
    }
}
?>

<?php include 'template_settings.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="LiteBans">
    <link href="<?php echo $this->page->resource('inc/img/favicon.ico'); ?>" rel="shortcut icon">
    <!-- CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="<?php echo $this->page->resource('inc/css/glyphicons.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo $this->page->resource('inc/css/custom.css'); ?>" rel="stylesheet">
    <script type="text/javascript">
        function withjQuery(tries, f) {
            if (window.jQuery) f();
            else if (tries > 0) window.setTimeout(function () {
                withjQuery(tries - 1, f);
            }, 100);
        }
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
</head>
    <body class="relative <?php if($darkmode=='true'){echo 'dark ';} if($main_color!='default'){echo $main_color;}?>">

    <div class="hidden absolute left-0 top-0 h-full md:hidden w-64 bg-gray-800 z-30" id="navbar-hamburger">
    	<div class="flex justify-end align-center p-4">
        	<button type="button" class="inline-block md:hidden text-gray-400 hover:text-white text-xl" onclick="toggleNav()">
            	<i class="fa-solid fa-xmark"></i>
        	</button>
    	</div>
      	<ul class="flex flex-col mt-4 rounded-lg">
    		<?php
            foreach($navigation_links as $key => $value) {
                $arrayValue = array_values($value);
                echo "<li><a class='block py-2 pl-3 pr-4 rounded text-gray-400 hover:bg-gray-700 hover:text-white' href='" . $arrayValue[2] ."'>" . $arrayValue[1] . "<span>" . $arrayValue[0] . "</span></a></li>"; 
            } 
            
            foreach($second_navigation_links as $key => $value) {
                $arrayValue = array_values($value);
                echo "<li><a class='flex gap-3 py-2 pl-3 pr-4 rounded text-gray-400 hover:bg-gray-700 hover:text-white' href='" . $arrayValue[2] ."'>" . $arrayValue[1] . "<span>" . $arrayValue[0] . "</span></a></li>"; 
            } 
            ?>
      	</ul>
    </div>
<header class="relative flex flex-col gap-8 pb-40 w-full overflow-hidden <?php if($second_navigation_active != 'true'){echo 'second-hidden pb-0';}?>" role="banner" style="background-image: linear-gradient(rgba(var(--first-banner-background-color)), rgba(var(--second-banner-background-color))), url('<?= $banner_img_link ?>');">
    <?php if($particles=='true'){echo '<div class="z-10" id="particles-js"></div>';} ?> 
    <nav class="h-20 flex-none relative z-20">
    	<div class="container mx-auto h-full flex justify-end md:justify-center items-center gap-12 px-5 lg:px-0">
    		<button type="button" class="inline-block md:hidden" onclick="toggleNav()">
      			<i class="fa-solid fa-bars"></i>
    		</button>
    		<div class="flex-1 hidden md:flex h-fit justify-end gap-12">
			<?php
               foreach($navigation_links as $key => $value) {
                    $arrayValue = array_values($value);
                    if ($arrayValue[3] == 'left') {
               			echo "<a class='item' href='" . $arrayValue[2] ."'>" . $arrayValue[1] . $arrayValue[0] . "</a>"; 
                	}
                } 
            ?>
    		</div>
    		<div class="flex-none hidden md:inline-block h-fit">
            <?php
               foreach($navigation_links as $key => $value) {
                    $arrayValue = array_values($value);
                    if ($arrayValue[3] == 'middle') {
               			echo "<a class='nav-btn item py-3 px-8 rounded' href='" . $arrayValue[2] ."'>" . $arrayValue[1] . $arrayValue[0] . "</a>"; 
                	}
                } 
            ?>
    		</div>
    		<div class="flex-1 h-fit hidden md:flex justify-start gap-12">
			<?php
               foreach($navigation_links as $key => $value) {
                    $arrayValue = array_values($value);
                    if ($arrayValue[3] == 'right') {
               			echo "<a class='item' href='" . $arrayValue[2] ."'>" . $arrayValue[1] . $arrayValue[0] . "</a>"; 
                	}
                } 
            ?>
    		</div>
    	</div>
    </nav>
    <div class="flex justify-between items-center flex-col z-20">
    <div class="flex-1 flex justify-center items-center gap-12 px-5 lg:px-0 w-full" style="min-height: 15rem;">
        <div class="flex-1 hidden lg:flex items-center justify-end gap-5">
            <div class="text-right copy <?php if($server_widget_active != 'true'){echo 'hidden';}?> hover:cursor-pointer" data-clipboard-text="<?=$server_IP_copy?>" onclick="change_text();">
                <h2 class="text-lg"><?= $server_IP_banner ?></h2>
                <span id="minecraftcount">No players online</span>
            </div>
            <div class="flex-none flex justify-center items-center h-16 w-16 icon rounded-lg <?php if($server_widget_active != 'true'){echo 'hidden';}?>">
                <i class="fa-solid fa-globe h-fit text-3xl"></i>
            </div>
        </div>
        <div class="flex-none max-h-96 max-w-md w-fit h-fit">
            <img class="animation-floating-logo p-6" src="<?= $logo_img_url ?>">
        </div>
        <div class="flex-1 hidden lg:flex items-center justify-start gap-5">
            <div class="flex-none flex justify-center items-center h-16 w-16 icon rounded-lg <?php if($server_widget_active != 'true'){echo 'hidden';}?>">
                <i class="fa-brands fa-discord  h-fit text-3xl"></i>
            </div>
            <div class="text-left <?php if($discord_widget_active != 'true'){echo 'hidden';}?>">
                <h2 class="text-lg">Discord server</h2>
                <span id="discordcount">No players online</span>
            </div>
        </div>
    </div>
    <div id="second-navigation" class="h-80 pt-16 mt-6 relative z-10 after:content-[''] after:absolute after:bottom-0 after:left:0 after:h-40 <?php if($second_navigation_active != 'true'){echo 'hidden';}?>">
        <div class="hidden lg:flex items-center justify-center gap-6 font-semibold">
        <?php
                $this->navbar(array(
                    "bans.php"     => $this->page->t("title.bans"),
                    "mutes.php"    => $this->page->t("title.mutes"),
                    "warnings.php" => $this->page->t("title.warnings"),
                    "kicks.php"    => $this->page->t("title.kicks"),
                ));
       ?>
       </div>
       </div>
    </div>
</header>
<main class="container mx-auto relative z-100 pt-24 pb-16 px-5 lg:px-0 <?php if($second_navigation_active != 'true'){echo 'pt-0';}?>">
     <div class="lg:hidden flex flex-col items-center justify-center gap-6 font-semibold bg-panel rounded-lg p-5 mb-8">
    	<?php
                $this->navbar(array(
                    "bans.php"     => $this->page->t("title.bans"),
                    "mutes.php"    => $this->page->t("title.mutes"),
                    "warnings.php" => $this->page->t("title.warnings"),
                    "kicks.php"    => $this->page->t("title.kicks"),
                ));
       ?>
    </div>
<?php

}
}
?>
