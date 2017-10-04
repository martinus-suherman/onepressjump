<?php
$onepress_team_id       = get_theme_mod( 'onepress_team_id', esc_html__('team', 'onepress') );
$onepress_team_disable  = get_theme_mod( 'onepress_team_disable' ) ==  1 ? true : false;
$onepress_team_title    = get_theme_mod( 'onepress_team_title', esc_html__('Our Team', 'onepress' ));
$onepress_team_subtitle = get_theme_mod( 'onepress_team_subtitle', esc_html__('Section subtitle', 'onepress' ));

if ( onepress_is_selective_refresh() || $onepress_team_disable ) 
{
    return;
}

$desc = get_theme_mod( 'onepress_team_desc' );
?>

<section id="<?php if ($onepress_team_id != '') echo $onepress_team_id; ?>" <?php do_action('onepress_section_atts', 'team'); ?>
	class="<?php echo esc_attr(apply_filters('onepress_section_class', 'section-team section-padding section-meta onepage-section', 'team')); ?>">
<?php 
do_action('onepress_section_before_inner', 'team'); 
?>
	<div class="container panel">
<?php 
	if ( $onepress_team_title || $onepress_team_subtitle || $desc )
	{ 
?>
		<div class="section-title-area">
<?php 
		if ($onepress_team_subtitle != '')
		{
			echo '<h5 class="section-subtitle">' . esc_html($onepress_team_subtitle) . '</h5>';
		}
		if ($onepress_team_title != '')
		{
			echo '<h2 class="section-title">' . esc_html($onepress_team_title) . '</h2>';
		}
		if ( $desc ) 
		{
			echo '<div class="section-desc">' . apply_filters( 'the_content', wp_kses_post( $desc ) ) . '</div>';
		} 
?>
		</div>
<?php 
	}
	
	if ( is_active_sidebar( 'team-widget-4-col' ) )
	{
?>
		<div class="team-members row team-layout-4 widget-area" role="complementary">
<?php 
		dynamic_sidebar( 'team-widget-4-col' ); 
?>
		</div>
<?php 
	} 

	if ( is_active_sidebar( 'team-widget-3-col' ) )
	{
?>
		<div class="team-members row team-layout-3 widget-area" role="complementary">
<?php 
		dynamic_sidebar( 'team-widget-3-col' ); 
?>
		</div>
<?php 
	} 

	if ( is_active_sidebar( 'team-widget-2-col' ) )
	{
?>
		<div class="team-members row team-layout-2 widget-area" role="complementary">
<?php 
		dynamic_sidebar( 'team-widget-2-col' ); 
?>
		</div>
<?php 
	} 
?>
	</div>
<?php 
do_action('onepress_section_after_inner', 'team'); 
?>
</section>
