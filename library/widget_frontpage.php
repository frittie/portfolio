<?php
class FrontpageWidget extends WP_Widget{

	public function __construct() {

		$widget_id = "Frontpage_widget";
		$widget_title = __('Frontpage widget', 'portfolio');
		$widget_desc = array(
			'description' => __('Used on frontpage for image links', 'portfolio')
			);

		parent::__construct($widget_id, $widget_title, $widget_desc);

	}

	public function form($instance){
		/*$field_id = $this->get_field_id('text');
		$field_name = $this->get_field_name('text');
		$value = $instance['text'];
		?>

		<p>
			<label for="<?php echo $field_id; ?>">
				<?php _e('Box title', 'portfolio'); ?>
			</label><br/>
			<input id="<?php echo $field_id; ?>" name="<?php echo $field_name; ?>" value="<?php echo $value; ?>" </>
		</p>

		<p>
			<?php 
			wp_dropdown_pages(
				array(
					'selected' => $instance['page_id'],
					'name' => $this->get_field_name('page_id')
					)
				)
			?>
		</p>

		<p>
			<?php */
			$img_id = $this->get_field_id('img');
			$img_name = $this->get_field_name('img');
			$img_value = $instance['img'];
			?>
			<input id="<?php echo $img_id; ?>" name="<?php echo $img_name; ?>" type="text" value="<?php echo $img_value;?>" />
			<input type="button" id="<?php echo $img_id; ?>_button" name="<?php echo $img_name; ?>"  class="button_upload_wp_media" value="Upload"/>
		</p>

		<script>
		jQuery(document).ready(function($){
			var _custom_media = true;
			var _send_attachment = wp.media.editor.send.attachment;

			$('.button_upload_wp_media').click(function(e) {
				var send_attachment_back = wp.media.editor.send.attachment;
				var button = $(this);
				var id = button.attr('id').replace("_button", '');
				_custom_media = true;
				wp.media.editor.send.attachment = function(props, attachment){
					if(_custom_media) {
						$("#"+id).val(attachment.url);
					}else{
						return _send_attachment.apply(this, [props, attachment]);
					}
				}
				wp.media.editor.open(button);
				return false;
			});

			$('.add_media').on('click', function(){
				_custom_media = false;

			});
		});
				</script>

		<?php
	}

	/**
	*Handle saving of widget
	**/

	public function update($new_instance, $old_instance){
		$instance = array();
		//$variabel = condition ? true : false;
		//$instance['text'] = (!empty($new_instance['text'])) ? strip_tags($new_instance['text']) : "";

		//$instance['page_id'] = $new_instance['page_id'];
		$instance['img'] = $new_instance['img'];

		return $instance;
	}

	/**
	*Output front end (HTML/CSS)
	**/
	public function widget($args, $instance) {
		//$url = get_permalink($instance['page_id']);
		$img_url = $instance['img'];
		?>
		<div class="frontpage_widget">
			<!--<div class="sidebar_widget_title">
				<a href="<?php echo $url; ?>">
					<?php echo $instance['text']; ?>
				</a>
			</div>-->
			<img src="<?php echo $img_url; ?>" />
			
		</div>
		<?php
	}
}

add_action('widgets_init', function() {
	register_widget('FrontpageWidget');
});

?>