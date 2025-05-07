import { __ } from '@wordpress/i18n';
import { ToolbarGroup, ToolbarButton } from "@wordpress/components"
import { RichText, BlockControls, useBlockProps } from '@wordpress/block-editor';
import { registerBlockType } from "@wordpress/blocks"
import './editor.scss';


export default function Edit(props) {
	function handleTextChange(x) {
    props.setAttributes({ text: x })
  }
  
	return (
		<div { ...useBlockProps() }>
		<BlockControls>
			<ToolbarGroup>
				<ToolbarButton
					isPressed={props.attributes.headingLevel === "h1"}
					onClick={() => props.setAttributes({ headingLevel: "h1" })}
				>
					H1
				</ToolbarButton>
				<ToolbarButton
					isPressed={props.attributes.headingLevel === "h2"}
					onClick={() => props.setAttributes({ headingLevel: "h2" })}
				>
					H2
				</ToolbarButton>
				<ToolbarButton
					isPressed={props.attributes.headingLevel === "h3"}
					onClick={() => props.setAttributes({ headingLevel: "h3" })}
				>
					H3
				</ToolbarButton>
			</ToolbarGroup>
		</BlockControls>
		<RichText
			allowedFormats={["core/bold", "core/italic", "core/underline"]}
			tagName={props.attributes.headingLevel || "h1"}
			className={`headline headline--${props.attributes.headingLevel || "h1"}`}
			value={props.attributes.text}
			onChange={handleTextChange}
		/>
		</div>
	);
}