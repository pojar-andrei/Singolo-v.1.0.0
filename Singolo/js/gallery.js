jQuery(document).ready(function($) {

	function Gallery(el,gll_filter,gll_data,gll_slider,galleryData){

		this.el = el;
		this.galleryData = galleryData;
		this.child_gll_filter = new Gallery_Filter(gll_filter,this.galleryData);
		this.child_gll_data = new Gallery_Data(gll_data,this.galleryData);
		//this.child_gll_slider = new Gallery_Slider(gll_slider,gll_data,this.galleryData);
		
		this.el.on('OpChange', this.filterOpChange.bind(this));
		//this.el.on('imagineClick', this.sliderImg.bind(this));

		
	}

	Gallery.prototype.filterOpChange = function(event,filter_trigger){
		this.child_gll_data.changeGallery(this.event,filter_trigger);
	}

	Gallery.prototype.sliderImg = function(event,imagineNumber){
		this.child_gll_slider.OnImgPress(this.event,imagineNumber);
	}

	var gll = new Gallery($('.gallery'),$('.gallery_nav'),$('.gallery_data'),$('.gallery_slider'),window.galleryData);
	
});