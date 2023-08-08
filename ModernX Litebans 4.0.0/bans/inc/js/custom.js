function getDiscordMembers(guild, startstringsingle, endstringsingle, startstringmulti, endstringmulti){
    $.get("https://discordapp.com/api/guilds/" + guild + "/embed.json", function (data) {
    	let output = "";
    	(!(data["presence_count"] == 1) ? output = (startstringmulti + " " + data["presence_count"] + " " + endstringmulti) : output = (startstringsingle + " " + data["presence_count"] + " " + endstringsingle));
        	$("#discordcount").html(output);
    });
}
    
function getMinecraftPlayers(ip, startstringsingle, endstringsingle, startstringmulti, endstringmulti) {
    $.getJSON("https://api.mcsrvstat.us/1/" + ip, function(data) {
    	let output = "";
    	(!(data.players.online == 1) ? output = (startstringmulti + " " + data.players.online + " " + endstringmulti) : output = (startstringsingle + " " + data.players.online + " " + endstringsingle));
        $("#minecraftcount").html(output);
    });
}
                
function toggleNav() {
    var mobileNav = document.getElementById("navbar-hamburger");
    mobileNav.classList.toggle("hidden");
}
    
function change_text(){
    document.getElementById("minecraftcount").innerHTML = "IP COPIED!";
}

function particleToggle() {
particlesJS("particles-js", {
  particles: {
    number: {
      value: 52,
      density: {
        enable: true,
        value_area: 631.3280775270874 } },


    color: {
      value: "#fff" },

    shape: {
      type: "circle",
      stroke: {
        width: 0,
        color: "#000000" },

      polygon: {
        nb_sides: 5 },

      image: {
        src: "img/github.svg",
        width: 100,
        height: 100 } },


    opacity: {
      value: 0.5,
      random: true,
      anim: {
        enable: false,
        speed: 1,
        opacity_min: 0.1,
        sync: false } },


    size: {
      value: 5,
      random: true,
      anim: {
        enable: false,
        speed: 40,
        size_min: 0.1,
        sync: false } },


    line_linked: {
      enable: false,
      distance: 500,
      color: "#ffffff",
      opacity: 0.4,
      width: 2 },

    move: {
      enable: true,
      speed: 1.5,
      direction: "bottom",
      random: false,
      straight: false,
      out_mode: "out",
      bounce: false,
      attract: {
        enable: false,
        rotateX: 600,
        rotateY: 1200 } } },



  interactivity: {
    detect_on: "canvas",
    events: {
      onhover: {
        enable: false,
        mode: "bubble" },

      onclick: {
        enable: true,
        mode: "repulse" },

      resize: true },

    modes: {
      grab: {
        distance: 400,
        line_linked: {
          opacity: 0.5 } },


      bubble: {
        distance: 400,
        size: 4,
        duration: 0.3,
        opacity: 1,
        speed: 3 },

      repulse: {
        distance: 200,
        duration: 0.4 },

      push: {
        particles_nb: 4 },

      remove: {
        particles_nb: 2 } } },



  retina_detect: true });
}

function toggleTheme() {
	document.body.classList.toggle('dark');
	
	if (document.body.classList.contains('dark')) {
    	setCookie('theme', 'dark', 365);
    } else {
    	setCookie('theme', 'light', 365);
    }
}

function getDomain() {
    const hostnameArray = window.location.hostname.split('.');
    const numberOfSubdomains = hostnameArray.length - 2;
    return hostnameArray.length === 2 ? window.location.hostname : hostnameArray.slice(numberOfSubdomains).join('.');
}

function setCookie(cname,cvalue,exdays) {
  const domain = getDomain();
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires=" + d.toGMTString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/" + ";domain=" + domain;
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}


function checkCookie() {   
	var color=getCookie("theme");
	if (color == "dark" && !document.body.classList.contains('dark')) {
    	document.body.classList.toggle('dark');
	} else if (color == 'light' && document.body.classList.contains('dark')){
    	document.body.classList.toggle('dark');
	} else {
    
    }
}