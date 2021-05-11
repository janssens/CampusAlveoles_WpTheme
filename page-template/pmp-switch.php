<?php
/**
 * Template Name: PaidMembershipPro - switch
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();

/** @var WP_Post $page */
$page =  null;
if(pmpro_hasMembershipLevel('1')) // gratuit
{
    $page = get_field('page_membres_gratuits');
}else if(pmpro_hasMembershipLevel(array())) // payant ou autre
{
    $page = get_field('page_membres_payants');
}else{ // aucun niveau de membre
    $page = get_field('page_non_membre');
}
$content = get_the_content(null,false,$page);
$content = apply_filters( 'the_content', $content );
echo $content;

get_footer();
