import { __ } from '@wordpress/i18n';
import { 
    InspectorControls, 
    MediaUpload, 
    MediaUploadCheck, 
    RichText, 
    URLInput
} from '@wordpress/block-editor';
import { 
    PanelBody, 
    Button, 
    RangeControl, 
    SelectControl,
    ToggleControl,
    TextControl
} from '@wordpress/components';

export default function Edit({ attributes, setAttributes }) {
    const { 
        imageUrl, 
        imageId, 
        adsSize, 
        imageAlt,
        linkUrl, 
        openInNewTab,
        alignment
    } = attributes;
    
    // Handler for selecting image
    const onSelectImage = (media) => {
        // Make sure we have the correct URL format
        const imageUrl = media.sizes && media.sizes.medium ? 
            media.sizes.medium.url : 
            media.url;
            
        setAttributes({
            imageUrl: imageUrl,
            imageId: media.id,
        });
    };
    
    // Handler for removing image
    const onRemoveImage = () => {
        setAttributes({
            imageUrl: '',
            imageId: 0,
        });
    };
    
    // Update link URL
    const onChangeUrl = (url) => {
        setAttributes({ linkUrl: url });
    };
    
    // Get alignment class name
    const getAlignmentClass = () => {
        return `align-${alignment.replace('flex-', '')}`;
    };
    
    return (
        <>
            <InspectorControls>
                <PanelBody title={__('Ads Image Settings', 'adi26r')} initialOpen={true}>
                    <MediaUploadCheck>
                        <MediaUpload
                            onSelect={onSelectImage}
                            allowedTypes={['image']}
                            value={imageId}
                            render={({ open }) => (
                                <Button 
                                    onClick={open}
                                    variant="primary"
                                    className="editor-media-placeholder__button"
                                    style={{ marginBottom: '8px', display: 'block' }}
                                >
                                    {imageId === 0 ? __('Select Ads Image', 'custom-blocks') : __('Replace Ads', 'adi26r')}
                                </Button>
                            )}
                        />
                    </MediaUploadCheck>
                    
                    {imageId !== 0 && (
                        <Button 
                            onClick={onRemoveImage}
                            variant="link"
                            isDestructive
                            style={{ marginBottom: '16px', display: 'block' }}
                        >
                            {__('Remove Ads', 'adi26r')}
                        </Button>
                    )}
                    
					<SelectControl
						label={__('Ads Size', 'adi26r')}
						value={adsSize}
						options={[
                            { label: __('Vertical Banner', 'adi26r'), value: 'vertical-banner' },
                            { label: __('Horizontal Banner', 'adi26r'), value: 'horizontal-banner' },
                        ]}
						onChange={(value) => setAttributes({ adsSize: value })}
					/>
                    
                    <SelectControl
                        label={__('Alignment', 'adi26r')}
                        value={alignment}
                        options={[
                            { label: __('Left', 'adi26r'), value: 'flex-start' },
                            { label: __('Center', 'adi26r'), value: 'center' },
                            { label: __('Right', 'adi26r'), value: 'flex-end' },
                        ]}
                        onChange={(value) => setAttributes({ alignment: value })}
                    />

                    <TextControl 
                        label={__('Ads Alt text','adi26r')}
                        value={imageAlt}
                        onChange={(value) => setAttributes({ imageAlt: value })}
                    />
                </PanelBody>
                
                <PanelBody title={__('Link Settings', 'adi26r')} initialOpen={true}>
                    <TextControl
                        label={__('Link URL', 'adi26r')}
                        value={linkUrl}
                        onChange={onChangeUrl}
                    />
                    <URLInput
                        value={linkUrl}
                        onChange={onChangeUrl}
                    />
                    
                    <ToggleControl
                        label={__('Open link in new tab', 'adi26r')}
                        checked={openInNewTab}
                        onChange={() => setAttributes({ openInNewTab: !openInNewTab })}
                    />
                </PanelBody>
            </InspectorControls>
            
            <div className={`adi26r-adsimage-block-editor ${getAlignmentClass()}`}>
                <div className="ads-link-container">
                    {imageUrl ? (
                        <img 
                            src={imageUrl}
                            alt={imageAlt || ''}
                            className="ads-link-image ${adsSize}"
                        />
                    ) : (
                        <div className="ads-placeholder ${adsSize}">
                            <span>{__('Select Ads Image', 'adi26r')}</span>
                        </div>
                    )}
                </div>
            </div>
        </>
    );
}