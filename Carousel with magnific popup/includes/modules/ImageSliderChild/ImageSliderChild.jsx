import React, { Component } from 'react';
import './style.css';


class ImageSliderChild extends Component {

  static slug = 'saex_image_slider_child';

  static css(props){
    var css=[];
  
    css.push([{
      // selector: "%%order_class%%",
      // declaration: `max-width: ${props.percantage_label}; min-width: ${props.percantage_label}; background: ${props.label_bg_color};`
    }]);
  
    return css;
  }  

  render() {
    const imageSrc = this.props.slider_image;

        return (
            <div>
                {imageSrc && <img src={imageSrc} alt={this.props.title_label} />}
            </div>
        );
 }
}

export default ImageSliderChild;
