import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, SelectControl, TextControl } from '@wordpress/components';
import { useEffect, useState } from '@wordpress/element';

export default function Edit({ attributes, setAttributes }) {
	const { postType, sectionTitle, sectionDescription } = attributes;
	const [postTypeOptions, setPostTypeOptions] = useState([]);

	useEffect(() => {
		// Fetch post types dynamically
		wp.apiFetch({ path: '/wp/v2/types' }).then((types) => {
			const options = Object.values(types).map((type) => ({
				label: type.name,
				value: type.slug,
			}));
			setPostTypeOptions(options);
		});
	}, []);

	return (
		<div {...useBlockProps()}>
			<InspectorControls>
				<PanelBody title={__('Settings', 'adi26r')}>
					<SelectControl
						label={__('Post Type', 'adi26r')}
						value={postType}
						options={postTypeOptions}
						onChange={(value) => setAttributes({ postType: value })}
					/>
					<TextControl
						label={__('Section Title', 'adi26r')}
						value={sectionTitle}
						onChange={(value) => setAttributes({ sectionTitle: value })}
					/>
					<TextControl
						label={__('Section Description', 'adi26r')}
						value={sectionDescription}
						onChange={(value) => setAttributes({ sectionDescription: value })}
					/>
				</PanelBody>
			</InspectorControls>
			<div>
				<h2>{sectionTitle}</h2>
				<p>{sectionDescription}</p>
				<div className="our-placeholder-block">
					{__('Select a post type to display its latest posts.', 'adi26r')}
				</div>
			</div>
		</div>
	);
}
