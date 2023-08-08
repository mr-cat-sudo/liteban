<?php include 'template_settings.php'; ?>
</main>
<footer>
<div class="container mx-auto flex flex-wrap gap-12 justify-between py-12 px-5 lg:px-0">
	<div class="flex-1 basis-60">
		<img class="opacity-75 hover:opacity-100 " src="<?= $logo_img_url ?>"9>
	</div>
	<div class="flex-1 basis-60 <?php if($footerlinks_active != 'true'){echo 'hidden';}?>">
		<h2 class="text-2xl font-semibold mb-3"><?= $footer_links_title ?></h2>
		<?php
        foreach($footer_links as $key => $value) {
        echo "<a class='block w-full h-fit bg-footer-link p-4 mb-2 rounded animation-footer-link' href='" . $value ."'>" . $key . "</a>"; 
        } 
        ?>
	</div>
	<div class="flex-1 basis-60 <?php if($footertext_active != 'true'){echo 'hidden';}?>">
		<h2 class="text-2xl font-semibold mb-3"><?= $footer_title ?></h2>
		<div class="block mb-2">
			<p>
        		<?= $footer_text ?>
			</p>
		</div>
		<div class="block">
			<a href="<?= $footer_button_link ?>"><div class="inline-block w-fit bg-primary-button font-bold px-10 py-4 rounded"><?= $footer_button_title ?></div></a>
		</div>
	</div>
</div>

<div class="bg-copyright h-fit py-6 text-sm px-5 lg:px-0">
	<div class="container mx-auto flex items-center justify-between flex-grow gap-5">
    	<div class="flex-none inline-block">
        	© Copyright 2023, <?= $site_name ?>
    	</div>
    	<div class="flex-none inline-block">
        	<div onClick="toggleTheme()" class="flex justify-center items-center rounded-lg bg-toggle hover:cursor-pointer p-5">
        		<i class="fa-solid fa-moon dark-hidden text-slate-700"></i>
        		<i class="fa-solid fa-sun dark-show text-slate-300"></i>
        	</div>
    	</div>
	</div>
</div>
</footer>

<script src="<?php echo $this->resource('inc/js/jquery-3.5.1.min.js'); ?>"></script>
<script type="text/javascript" src="inc/js/custom.js"></script>

<script>
var clipboard = new ClipboardJS('.copy');

window.onload = function() {
	<?php if($themetoggler == 'true') {
	echo "checkCookie();";
	} ?>
    getDiscordMembers("<?= $discord_guild_ID ?>", "<?= $player_online_text_single_start ?>", "<?= $player_online_text_single_end ?>", "<?= $player_online_text_multi_start ?>", "<?= $player_online_text_multi_end ?>");
    
    getMinecraftPlayers("<?= $server_IP ?>", "<?= $player_online_text_single_start ?>", "<?= $player_online_text_single_end ?>", "<?= $player_online_text_multi_start ?>", "<?= $player_online_text_multi_end ?>");
        setInterval(function() {
            getMinecraftPlayers("<?= $server_IP ?>",  "<?= $player_online_text_single_start ?>", "<?= $player_online_text_single_end ?>", "<?= $player_online_text_multi_start ?>", "<?= $player_online_text_multi_end ?>");
        }, 60 * 1000);
}
</script>

<?php if($this->particles == true) {
    echo "<script src='https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js'></script>";
    echo "<script id='rendered-js'> particleToggle();</script>";
} ?>
<?php echo "</html>"; ?>