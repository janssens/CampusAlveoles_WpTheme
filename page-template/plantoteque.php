<?php
/**
 * Template Name: Alveoles - plantotech
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();

$url = get_field('bdd_url');
?>
<iframe id="main" src="" frameborder="0" width="100%" height="100%" style="min-height: 900px">

</iframe>
<script>
let url = "<?php echo $url; ?>"+window.location.hash.substr(2);
    document.getElementById('main').setAttribute('src',url);
    window.addEventListener('message', message => {
        console.log(message.data);
        document.title = message.data.meta_title;
        let full_path = (message.data.path) ? message.data.path : '';
        full_path += (typeof message.data.search != "undefined") ? message.data.search : '';
        history.pushState(message.data, message.data.meta_title,"#!"+full_path);
    });
    window.addEventListener('popstate', function(e){
        if(e.state){
            document.getElementById('main').setAttribute('src','<?php echo $url; ?>'+e.state.path+e.state.search);
        }
    });
</script>
<?php
get_footer();
