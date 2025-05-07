import { registerBlockType } from '@wordpress/blocks';
import { RichText } from '@wordpress/block-editor'; // Add this import

import Edit from './edit';
import metadata from './block.json';
import './style.scss';

function Save(props) {
  function createTagName() {
    switch (props.attributes.headingLevel) {
      case "h1":
        return "h1"
      case "h2":
        return "h2"
      case "h3":
        return "h3"
      default:
        return "h1"
    }
  }

  return (
    <RichText.Content
      tagName={createTagName()}
      value={props.attributes.text}
      className={`headline headline--${props.attributes.headingLevel || "h1"}`}
    />
  )
}

registerBlockType( metadata.name, {
  edit: Edit,
  save: Save
} );