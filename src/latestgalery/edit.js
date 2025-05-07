import { __ } from '@wordpress/i18n';
import { RichText, useBlockProps } from '@wordpress/block-editor';
import './editor.scss';

export default function Edit() {
	const {
		sectionTitle,
		sectionDescription
	} = attributes;
	return (
		<div { ...useBlockProps() }>
      <section className="adi26r-latest-gallery-widget-edit">
				<RichText 
					tagName="h3" 
					className="title" 
					value={sectionTitle} 
					onChange={(content) => setAttributes({ sectionTitle: content })} 
					placeholder={__('please type the title', 'custom-blocks')}
				/>
				<RichText 
					tagName="p" 
					className="description" 
					value={sectionDescription} 
					onChange={(content) => setAttributes({ sectionDescription: content })} 
					placeholder={__('please type the description', 'custom-blocks')}
				/>
				<div className='our-placeholder-block'>
					To lazy to style it on edit screen :v
				</div>
			</section>
		</div>
	);
}
