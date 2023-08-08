<?php
require_once './inc/init.php';

class Page {
    public function __construct($name, $header = true, $connect = true) {
    	//The name of your site. Used for the title of your website and the copyright name and link preview.
    $this->site_name = 'ModernX';
    
    //The link of the page. Used for link preview.
    $this->site_link = 'https://templates.jtgraphics.nl/modernx/vote';
    
    //The title of the page. Used for link preview.
    $this->site_title = 'ModernX | Vote';
    
    //The descriptin of the page. Used for link preview.
    $this->site_description = 'This is a showcase of the ModernX vote template';
    
    //The image of the page. Used for link preview.
    $this->site_image = 'https://templates.jtgraphics.nl/modernx/vote/img/logo.png';
    
    //The theme color of the page (in HEX-colors) of the page. Used for link preview.
    $this->site_theme_color = '#3549cc';
    
    //set to 'true' to enable darkmode, set to 'false' to disable darkmode.
    $this->darkmode = 'false';
    
    //Set to 'true' to enable particles in header, set to 'false' to remove particles
    $this->particles = 'true';
    
    //Change the primary color of the website. Use any of the predefined colors below or set to 'custom' to use a custom color which you can change in custom.css.
    //Predefined colors: blue, red, green, yellow, purple
    //Set to 'default' if you want to use the default color.
    $this->main_color = 'default';
    
    $this->logo_img_url = 'img/logo.png';
    
    $this->banner_img_link = 'https://templates.jtgraphics.nl/modernx/vote/img/Background.png';
    
    //Used to get member count. You can find your Discord Guild ID by right clicking on your server and clicking Copy ID.
    //If the member count isn't working after setting this up, make sure to enable Server Widget in your server settings.
    $this->discord_guild_ID = '726614793284223027';
    
    //Invite link for your discord server.
    $this->discord_invite_link = 'https://discord.gg/trBJjKB';
    
    //IP that is shown in the banner.
    $this->server_IP_banner = 'PLAY.HYPIXEL.NET';
    
    //Ip that is used to get online player count. This is also the IP that is copied when players click on the IP.
    $this->server_IP = 'play.hypixel.net';
    
    //Links for the top navigation. Please contact me on discord (https://discord.gg/trBJjKB) if you are in need for further instructions.
    $this->navigation_links=array(
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
    
    //Links for the second navigation. Please contact me on discord (https://discord.gg/trBJjKB) if you are in need for further instructions.
    $this->second_navigation_links=array(
        
        "Home" => array(
            "name"=>"Home",
            "icon"=>"<i class='icon fas fa-users fa-fw'></i>",
            "href"=>"./",
        ),
        
        "Forum" => array(
            "name"=>"Forum",
            "icon"=>"<i class='icon fas fa-users fa-fw'></i>",
            "href"=>"./forum",
        ),
        
        "Store" => array(
            "name"=>"Store",
            "icon"=>"<i class='icon fas fa-users fa-fw'></i>",
            "href"=>"./",
        ),
        
        "Vote" => array(
            "name"=>"Vote",
            "icon"=>"<i class='icon fas fa-users fa-fw'></i>",
            "href"=>"./",
        ),
        
        "Staff" => array(
            "name"=>"Staff",
            "icon"=>"<i class='icon fas fa-users fa-fw'></i>",
            "href"=>"./",
        ),
        
    );
    
    //FOOTER
    //Title that is used at the about me section in the footer.
    $this->footer_title = 'Support us';
    
    //Text that is used at the about me section in the footer.
    $this->footer_text = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.';
    
    //Title of button on footer text
    $this->footer_button_title = 'Visit Store';
    
    //Link of button on footer text
    $this->footer_button_link = 'https://store.jtgraphics.nl';
    
    //Title displayed above links in footer
    $this->footer_links_title = 'Useful links';
    
    //Links for the footer navigation. Please contact me on discord (https://discord.gg/trBJjKB) if you are in need for further instructions.
    $this->footer_links=array(
        
        "Home"=>"/",
        
        "Forum"=>"./forum",
        
        "Vote"=>"./vote",
        
    );
    
        $this->time = microtime(true);
        ini_set('default_charset', 'utf-8');
        require_once './inc/settings.php';
        require_once './inc/database.php';
        if (class_exists("EnvSettings")) {
            $cfg = new EnvSettings();
        } else {
            $cfg = new Settings();
        }
        setlocale(LC_ALL, $cfg->lang);

        require_once './lang/en_US.utf8.php';
        require_once './lang/' . $cfg->lang . '.php';
        $lang_class = substr($cfg->lang, 0, strpos($cfg->lang, ".")); // grab "en_US" from "en_US.utf8"
        if ($lang_class !== "en_US" && class_exists($lang_class)) {
            $this->lang = new $lang_class;
        } else {
            $this->lang = new en_US();
        }
        $this->db = new Database($cfg, $connect, !($cfg instanceof EnvSettings));

        $this->formatter = new IntlDateFormatter($cfg->lang, IntlDateFormatter::LONG, IntlDateFormatter::NONE, $cfg->timezone, IntlDateFormatter::GREGORIAN, $cfg->date_format);

        $this->conn = $this->db->conn;
        $this->settings = $cfg;
        $this->uuid_name_cache = array();

        $this->name = $name;

        $this->type = null;
        $this->table = null;
        $this->title = null;

        $info = $this->type_info($name);
        $this->set_info($info);

        $this->permanent = array(
            'ban'  => $this->t("generic.permanent.ban"),
            'mute' => $this->t("generic.permanent.mute"),
            'warn' => $this->t("generic.permanent"),
            'kick' => null,
        );
        $this->expired = array(
            'ban'  => $this->t("page.expired.ban"),
            'mute' => $this->t("page.expired.mute"),
            'warn' => $this->t("page.expired.warning"),
            'kick' => null,
        );
        $this->expired_by = array(
            'ban'  => $this->t("page.expired.ban-by"),
            'mute' => $this->t("page.expired.mute-by"),
            'warn' => $this->t("page.expired.warning"),
            'kick' => null,
        );
        $this->punished_by = array(
            'ban'  => $this->t("generic.banned.by"),
            'mute' => $this->t("generic.muted.by"),
            'warn' => $this->t("generic.warned.by"),
            'kick' => $this->t("generic.kicked.by"),
        );

        $this->table_headers_printed = false;
        $this->args = array_values($_GET);
        $this->is_index = ((substr($_SERVER['SCRIPT_NAME'], -strlen("index.php"))) === "index.php");
        if ($this->is_index) {
            $this->index_base_path = substr($_SERVER["PHP_SELF"], 0, -strlen("index.php"));
            if ($cfg->simple_urls) {
                $keys = array_keys($_GET);

                if (count($keys) > 0) {
                    $request_path = $keys[0];
                    $local_path = substr($request_path, strlen($this->index_base_path));

                    $this->args = explode("/", substr($local_path, strpos($local_path, "/") + 1));
                } else {
                    $this->args = array();
                }
            }
        }
        $argc = count($this->args);
        $this->page = 1;
        $page = "1";
        if (isset($_GET['page'])) {
            $page = $_GET['page']; // user input
        } else if ($argc > 1) {
            $page = $this->args[$argc - 2];
        }
        if (filter_var($page, FILTER_VALIDATE_INT)) {
            $this->page = max(0, (int)$page);
        }

        require_once './inc/header.php';
        $this->header = new Header($this);
        if ($header) {
            $this->header->print_header();
        }
    }

    public function get_requested_page() {
        $keys = array_keys($_GET);
        if (count($keys) == 0 || !$this->is_index) return "";

        $request_path = $keys[0];
        $local_path = substr($request_path, strlen($this->index_base_path));

        return substr($local_path, 0, strpos($local_path, "/"));
    }

    public function t($str) {
        if (array_key_exists($str, $this->lang->array)) {
            return $this->lang->array[$str];
        }
        return "[$str]";
    }

    public function type_info($type) {
        $cfg = $this->settings;
        switch ($type) {
            case "ban":
            case "bans":
                return array(
                    "type"  => "ban",
                    "table" => $cfg->table['bans'],
                    "title" => $this->t("title.bans"),
                    "page"  => "bans.php",
                );
            case "mute":
            case "mutes":
                return array(
                    "type"  => "mute",
                    "table" => $cfg->table['mutes'],
                    "title" => $this->t("title.mutes"),
                    "page"  => "mutes.php",
                );
            case "warn":
            case "warnings":
                return array(
                    "type"  => "warn",
                    "table" => $cfg->table['warnings'],
                    "title" => $this->t("title.warnings"),
                    "page"  => "warnings.php",
                );
            case "kick":
            case "kicks":
                return array(
                    "type"  => "kick",
                    "table" => $cfg->table['kicks'],
                    "title" => $this->t("title.kicks"),
                    "page"  => "kicks.php",
                );
            default:
                return array(
                    "type"  => null,
                    "table" => null,
                    "title" => null,
                    "page"  => null,
                );
        }
    }

    /**
     * @param $info
     */
    function set_info($info) {
        $this->type = $info['type'];
        $this->table = $info['table'];
        $this->title = $info['title'];
    }

    function run_query() {
        try {
            $table = $this->table; // Safe user input (constants only)
            $limit = $this->settings->limit_per_page; // Not user input

            $offset = 0;
            if ($this->settings->show_pager) {
                $page = $this->page - 1;
                $offset = ($limit * $page);
            }

            $select = $this->get_selection($table); // Not user input

            $where = $this->where_append($this->db->active_query); // Not user input
            $where .= "(uuid <> '#offline#' AND uuid IS NOT NULL)";

            $st = $this->conn->prepare("SELECT $select FROM $table $where ORDER BY time DESC LIMIT :limit OFFSET :offset");
            $st->bindParam(':offset', $offset, PDO::PARAM_INT);
            $st->bindParam(':limit', $limit, PDO::PARAM_INT);

            $st->execute();

            $rows = $st->fetchAll(PDO::FETCH_ASSOC);

            $st->closeCursor();

            return $rows;
        } catch (PDOException $ex) {
            $this->db->handle_error($this->settings, $ex);
            return array();
        }
    }

    function get_selection($table, $phpIsBroken = true) {
        $columns = array("id", "uuid", "reason", "banned_by_name", "banned_by_uuid", "time", "until", "server_origin", "server_scope", "active", "ipban");
        $bitColumns = array("active", "ipban");

        if ($table === $this->settings->table['warnings']) {
            $columns[] = "warned";
            $bitColumns[] = "warned";
        }

        if ($table !== $this->settings->table['kicks']) {
            array_push($columns, "removed_by_uuid", "removed_by_name", "removed_by_date", "removed_by_reason");
        }

        // Under certain versions of PHP, there is a bug with BIT columns.
        // An empty string is returned no matter what the value is.
        // Workaround: cast to unsigned.
        if ($phpIsBroken === true && $this->settings->driver !== 'pgsql') {
            foreach ($bitColumns as $column) {
                unset($columns[$column]);
                $columns[] = "CAST($column AS UNSIGNED) AS $column";
            }
        }
        return implode(",", $columns);
    }

    /**
     * Returns HTML representing the Minecraft avatar for a specific name or UUID.
     * @return string
     */
    function get_avatar($name, $uuid, $name_under = true, $name_repl = null, $name_left = true) {
        if ($name_under) {
            $name_under = $this->settings->avatar_names_below;
        }
        $avatar_source = $this->settings->avatar_source;

        if (strlen($uuid) === 36 && $uuid[14] === '3') {
            $avatar_source = $this->settings->avatar_source_offline_mode;
        }

        $uuid = $this->uuid_undashify($uuid);
        $src = str_replace(array('{uuid}', '{name}'), array($uuid, $name), $avatar_source);
        if (in_array($name, $this->settings->console_aliases) || $name === $this->settings->console_name) {
            $src = $this->resource($this->settings->console_image);
            $name = $this->settings->console_name;
        }
        if ($name_repl !== null) {
            $name = $name_repl;
        }
        $img = "<img class='avatar noselect mb-2' src='$src'/>";
        $str = "{$img}$name";
        if ($name_under) {
            $str = "{$img} $name";
            return "<div class='avatar-name' align='center'>$str</div>";
        }
        if ($name_left) {
            return "<div class='avatar-name-left' align='left'>$str</div>";
        }
        return $str;
    }

    /**
     * Returns the banner name for a specific row in the database
     * using their UUID->name if possible, otherwise returns their last recorded name.
     * @param row
     * @return string
     */
    function get_banner_name($row) {
        $uuid = $row['banned_by_uuid'];
        $display_name = $row['banned_by_name'];
        $console_aliases = $this->settings->console_aliases;
        if (in_array($uuid, $console_aliases) || in_array($row['banned_by_name'], $console_aliases)) {
            return $this->settings->console_name;
        }
        $name = $this->get_name($uuid);
        if ($name !== null) {
            return $name;
        }
        return $this->clean($display_name);
    }

    /**
     * Returns the last name for a UUID, or null if their name is not recorded in the database.
     * @param string
     * @return null|string
     */
    function get_name($uuid) {
        if ($uuid === null || $uuid === "" || $uuid[0] === '#') return null;
        if (in_array($uuid, $this->settings->console_aliases)) return $this->settings->console_name;
        if (array_key_exists($uuid, $this->uuid_name_cache)) return $this->uuid_name_cache[$uuid];

        $result = null;
        $table = $this->settings->table['history']; // Not user input

        $stmt = $this->conn->prepare("SELECT name FROM $table WHERE uuid=:uuid ORDER BY date DESC LIMIT 1");
        $stmt->bindParam(":uuid", $uuid, PDO::PARAM_STR);
        if ($stmt->execute() && $row = $stmt->fetch()) {
            $result = $row['name'];
        }
        $stmt->closeCursor();

        $this->uuid_name_cache[$uuid] = $result;
        return $result;
    }

    /**
     * Prepares text to be displayed on the web interface.
     * Removes chat colours, replaces newlines with proper HTML, and sanitizes the text.
     * @param string
     * @return string|null
     */
    function clean($text) {
        if ($text === null) return null;
        if (strstr($text, "\xa7") || strstr($text, "&")) {
            $text = preg_replace("/(?i)(\x{00a7}|&)[0-9A-FK-OR]/u", "", $text);
        }
        $text = htmlspecialchars($text, ENT_QUOTES);
        if (strstr($text, "\\n")) {
            $text = preg_replace("/\\\\n/", "<br>", $text);
        }
        return $text;
    }

    function server($row, $col = "server_scope") {
        $server = $this->clean($row[$col]);
        if ($server === null) {
            return "-";
        }
        if ($server === "*") {
            return $this->t("table.server.global");
        }
        return $server;
    }

    /**
     * Returns a string that shows the expiry date of a punishment.
     * If the punishment does not expire, it will be shown as permanent.
     * If the punishment has already expired, it will show as expired.
     * @param row
     * @return string
     */
    function expiry($row) {
        if ($this->type === "kick") {
            return $this->t("generic.expired.kick");
        }
        if ($row['until'] <= 0) {
            $until = $this->permanent[$this->type];
        } else {
            $until = $this->millis_to_date($row['until']);
        }
        $expired = $this->is_expired($row);
        if ($this->active($row) === false) {

            $done = false;

            // Unbanned by $name
            $removed_by_uuid = $row['removed_by_uuid'];
            if ($removed_by_uuid !== null) {
                // Player has been unbanned

                // Check if uuid can be converted to name
                $name = $this->get_name($removed_by_uuid);
                if ($name === null) {
                    // Couldn't find name in history table, use removed_by_name instead
                    $name = $this->clean($row['removed_by_name']);
                }
                if ($name !== null) {
                    $until .= ' ' . str_replace('{name}', $name, $this->expired_by[$this->type]);
                    $done = true;
                }
            }
            if ($expired) {
                $done = true;
            }
            if ($done === false) {
                $until .= ' ' . $this->expired[$this->type];
            }
        }
        if ($expired) {
            $until .= ' ';
            $until .= $this->t("page.expired.warning");
        }
        return $until;
    }

    /**
     * Converts a timestamp (in milliseconds) to a date using the configured date format.
     * @param int
     * @return string
     */
    function millis_to_date($millis) {
        $ts = $millis / 1000;
        $result = $this->formatter->format($ts);
        $translations = $this->settings->date_month_translations;
        if ($translations !== null) {
            foreach ($translations as $key => $val) {
                $result = str_replace($key, $val, $result);
            }
        }
        return $result;
    }

    function active($row, $field = 'active') {
        return (((int)$row[$field]) !== 0);
    }

    function is_expired($row) {
        $removed_by_name = $row['removed_by_name'];
        if ($removed_by_name === "#expired") return true;
        if ($removed_by_name !== null && $removed_by_name !== "") return false;

        $until = $row['until'];

        if ($until <= 0) return false;

        $time = gettimeofday();
        $millis = $time["sec"] * 1000;

        return ($millis > $until);
    }

    /**
     * Returns true if a string should be treated as a UUID.
     * @param $str
     * @return bool
     */
    function is_uuid($str) {
        $len = strlen($str);
        return ($len == 32 || $len == 36);
    }

    function uuid_dashify($str) {
        $len = strlen($str);
        if ($len !== 32) return $str;
        $newstr = "";
        $cur = 0; // current position in chunk, resets to 0 when it reaches limit
        $chunk = 0; // current amount of "-" characters, 5 chunks are in a UUID (1-2-3-4-5)
        $limit = 8; // maximum amount of characters in the current chunk (8-4-4-4-12)
        for ($i = 0; $i < $len; $i++) {
            $chr = $str[$i];
            $newstr .= $chr;
            if (++$cur >= $limit) {
                $cur = 0;
                if ($i < 31) {
                    $newstr .= '-';
                }
                $chunk++;
                if ($chunk == 1) $limit = 4;
                if ($chunk >= 4) $limit = 12;
            }
        }
        return $newstr;
    }

    function uuid_undashify($str) {
        if (strlen($str) !== 36) return $str;
        return str_replace('-', '', $str);
    }

    function print_title() {
        $title = $this->title;
        $name = $this->settings->name;
        if ($title !== null) {
            $name = "$title - $name";
        }
        echo "<title>$name</title>";
    }

    function print_table_rows($row, $array, $print_headers = true) {
        $type = $this->type;
        if (!$this->settings->show_server_scope) {
            unset($array["server.name"]);
        }
        if (!$this->settings->show_server_origin) {
            unset($array["server.origin"]);
        }
        if ($print_headers && !$this->table_headers_printed) {
            $headers = array_keys($array);
            $headers_translated = array();
            foreach ($headers as $header) {
                if ($header === "executor" && $this->name !== "history") {
                    $header = $this->punished_by[$type];
                } else {
                    $header = $this->t("table.$header");
                }
                $headers_translated[] = $header;
            }
            $this->table_print_headers($headers_translated);
            $this->table_headers_printed = true;
        }
        $id = $row['id'];
        echo "<tr class='text-center'>";
        foreach ($array as $header => $text) {
            $a = "a";
        	$icon = "";
            if ($header === "received-warning") {
                $icon = ($text !== "0") ? "fa-solid fa-check" : "fa-solid fa-xmark";
                $a .= " aria-hidden=true";
                $text = "";
            }
            $href = $this->link("info.php?type=$type&id=$id");
            echo "<td class='p-4'><$a href=\"$href\"><i class=\"$icon\"></i>$text</a></td>";
        }
        echo "</tr>";
    }

    function table_print_headers($headers) {
        echo "<thead class='bg-table-header'><tr>";
        foreach ($headers as $header) {
            echo "<th class='p-4'>$header</th>";
        }
        echo "<tbody>";
    }

    function print_header($container_start = true, $title = null, $class = "modal-header litebans-header") {
        if ($title === null) {
            $title = $this->title;
        }
        if ($container_start) {
            echo '<div class="container">';
        }
    
    	$class="text-2xl font-bold";

        echo "<div class='flex justify-between items-center flex-wrap gap-3'><h1 class=\"$class\">$title</h1>";
        if ($container_start) {
            echo '<div>';
        }
    }

    function print_check_form() {
        $link = $this->link('check.php');
        $table = $this->name;
        echo '
        <form action="check.php" onsubmit="captureForm(event);" class="flex justify-end h-12">
            <div class="form-group flex-none h-full">
                <input type="text" class="form-control h-full px-4" name="name" id="user" placeholder="' . $this->t("generic.player-name") . '">
            </div>
            <input type="hidden" name="table" value="' . $this->name . '">
            <button type="submit" class="flex-none flex items-center justify-center btn bg-secondary-button h-full px-4">' . $this->t("action.check") . '</button>
        </form>
        <script type="text/javascript">function captureForm(b){var o=$(".litebans-check-output");o.removeClass("show");var x=setTimeout(function(){o.html("<br>")}, 150);$.ajax({type:"GET",url:"' . $link . '?name="+$("#user").val()+"&table=' . $table . '"}).done(function(c){clearTimeout(x);o.html(c);o.addClass("show")});b.preventDefault();return false};</script>
        <div class="litebans-check litebans-check-output fade" class="success fade" data-alert="alert"></div>
        <p class="noselect"></p>
        </div>
         ';
    }

    function print_pager($total = -1, $args = "", $prevargs = "", $page = null, $simple = true) {
        if (!$this->settings->show_pager) return;
    	echo "<div class='flex flex-col items-center'>";
        echo implode($this->generate_pager($total, $args, $prevargs, $page, $simple));
    	echo "</div>";
    }

    function generate_pager($total = -1, $args = "", $prevargs = "", $page = null, $simple = true) {
        $table = $this->table;
        if ($page === null) {
            $page = $this->name . ".php";
        }

        if ($total === -1) {
            $where = $this->where_append($this->name === "kicks" ? "" : $this->db->active_query);
            $where .= "(uuid <> '#offline#' AND uuid IS NOT NULL)";

            $st = $this->conn->query("SELECT COUNT(*) AS count FROM $table $where");
            $result = $st->fetch(PDO::FETCH_ASSOC);
            $st->closeCursor();
            $total = $result['count'];
        }

        $pages = (int)(($total - 1) / $this->settings->limit_per_page) + 1;

        $cur = $this->page;
        $prev = $cur - 1;
        $next = $this->page + 1;

        $prev_active = ($cur > 1);
        $next_active = ($cur < $pages);

        $prev_class = "" . ($prev_active ? "pager-active" : "inactive");
        $next_class = "" . ($next_active ? "pager-active" : "inactive");

        if ($simple) {
            $pager_prev_href = $this->append_param($this->link("$page{$prevargs}"), "page={$prev}");
            $pager_next_href = $this->append_param($this->link("$page{$args}"), "page={$next}");
           
        } else {
            $pager_prev_href = $this->append_param(($this->link("$page") . "{$prevargs}"), "page={$prev}");
            $pager_next_href = $this->append_param(($this->link("$page") . "{$args}"), "page={$next}");
        }

        $pager_prev = "<div class='inline-flex mt-2 xs:mt-0'> <a class=\"litebans-pager litebans-pager-left inline-flex items-center px-4 py-2 text-sm font-medium rounded-1 bg-panel-accent $prev_class  \" href=\"$pager_prev_href\"><i class=\"fa-solid fa-arrow-left mx-2 \"></i> Prev</a>";
        $pager_next = "<a class=\"litebans-pager litebans-pager-right inline-flex items-center px-4 py-2 text-sm font-medium border-0 border-l border-gray-700 rounded-r bg-panel-accent $next_class\" href=\"$pager_next_href\">Next <i class=\"fa-solid fa-arrow-right mx-2 \"></i></a></div>";

        $pager_count = '<div class="litebans-pager-number">Showing ' . $this->t("table.pager.number") . ' ' . $cur . ' of ' . $pages . '</div>';
        return array(
        	"count" => $pager_count,
            "prev"  => $pager_prev,
            "next"  => $pager_next,
        );
    }

    function print_footer($container_end = true) {
        if ($container_end) {
            echo "</div></div></div>";
        }
        $time = microtime(true) - $this->time;
        echo "<!-- Page generated in $time seconds. -->";

        require_once './inc/footer.php';
    }

    function append_param($url, $param) {
        if (preg_match("/\?[a-z]+=/", $url)) {
            return "${url}&${param}";
        }
        return "${url}?${param}";
    }

    function link($url) {
        if ($this->settings->simple_urls && $this->is_index) {
            $url = preg_replace("/\.php/", "", $url, 1);
            $url = preg_replace("/\?[a-z]+=/", "/", $url);
            $url = preg_replace("/&[a-z]+=/", "/", $url);
            $url = $this->index_base_path . $url . "/";
        }
        return $url;
    }

    function resource($file) {
        if (!file_exists($file)) return $file;

        $mtime = filemtime($file);
        if ($this->settings->simple_urls && $this->is_index) {
            $file = $this->index_base_path . $file;
        }
        return "$file?" . $mtime;
    }

    function table_begin() {
        echo '</div>
        </div><div class="overflow-x-scroll scroll-hidden"><table class="table-striped bg-panel px-6 w-full my-6">';
    }

    function table_end($clicky = true) {
        echo '</table></div>';
        if ($clicky) {
            echo "<script type=\"text/javascript\">withjQuery(30,function(){ $('tr').click(function(){var href=$(this).find('a').attr('href');if(href!==undefined)window.location=href;}).hover(function(){\$(this).toggleClass('hover');}); });</script>";
        }
    }

    /**
     * @param $where
     * @return string
     */
    public function where_append($where) {
        if ($where !== "") {
            return "$where AND ";
        }
        return "WHERE ";
    }
}
