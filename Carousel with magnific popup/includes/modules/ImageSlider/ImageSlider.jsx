import React, { Component } from 'react';
import './style.css';


class ImageSlider extends Component {

  static slug = 'saex_image_slider';

  render() {
     return (
          <div class="parent-image-slider">{this.props.content}</div>
     );
  }
}

export default ImageSlider;
