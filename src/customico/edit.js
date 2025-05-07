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

/**
 * Edit function for the Icon Link Block
 */
export default function Edit({ attributes, setAttributes }) {
    const { 
        imageUrl, 
        imageId, 
        imageSize, 
        imageAlt,
        linkUrl, 
        linkText,
        alignment,
        openInNewTab,
        layout
    } = attributes;
    
    // Handler for selecting image
    const onSelectImage = (media) => {
        // Make sure we have the correct URL format
        const imageUrl = media.sizes && media.sizes.thumbnail ? 
            media.sizes.thumbnail.url : 
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
                <PanelBody title={__('Icon Settings', 'custom-blocks')} initialOpen={true}>
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
                                    {imageId === 0 ? __('Select Icon Image', 'custom-blocks') : __('Replace Icon', 'custom-blocks')}
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
                            {__('Remove Icon', 'custom-blocks')}
                        </Button>
                    )}
                    
                    <RangeControl
                        label={__('Icon Size (px)', 'custom-blocks')}
                        value={imageSize}
                        onChange={(value) => setAttributes({ imageSize: value })}
                        min={16}
                        max={256}
                        step={4}
                    />
                    
                    <SelectControl
                        label={__('Alignment', 'custom-blocks')}
                        value={alignment}
                        options={[
                            { label: __('Left', 'custom-blocks'), value: 'flex-start' },
                            { label: __('Center', 'custom-blocks'), value: 'center' },
                            { label: __('Right', 'custom-blocks'), value: 'flex-end' },
                        ]}
                        onChange={(value) => setAttributes({ alignment: value })}
                    />
                    
                    <SelectControl
                        label={__('Layout', 'custom-blocks')}
                        value={layout}
                        options={[
                            { label: __('Vertical (Icon above text)', 'custom-blocks'), value: 'vertical' },
                            { label: __('Horizontal (Icon beside text)', 'custom-blocks'), value: 'horizontal' },
                        ]}
                        onChange={(value) => setAttributes({ layout: value })}
                    />

                    <TextControl 
                        label={__('icon Alt text','custom-blocks')}
                        value={imageAlt}
                        onChange={(value) => setAttributes({ imageAlt: value })}
                    />
                </PanelBody>
                
                <PanelBody title={__('Link Settings', 'custom-blocks')} initialOpen={true}>
                    <TextControl
                        label={__('Link URL', 'custom-blocks')}
                        value={linkUrl}
                        onChange={onChangeUrl}
                    />
                    <URLInput
                        value={linkUrl}
                        onChange={onChangeUrl}
                    />
                    
                    <ToggleControl
                        label={__('Open link in new tab', 'custom-blocks')}
                        checked={openInNewTab}
                        onChange={() => setAttributes({ openInNewTab: !openInNewTab })}
                    />
                </PanelBody>
            </InspectorControls>
            
            <div className={`adi26r-customico-block-editor ${layout} ${getAlignmentClass()}`}>
                <div className="icon-link-container">
                    {imageUrl ? (
                        <img 
                            src={imageUrl}
                            alt={imageAlt || ''}
                            className="icon-link-image"
                            style={{ 
                                width: `${imageSize}px`,
                                height: `${imageSize}px`
                            }}
                        />
                    ) : (
                        <div className="icon-placeholder" style={{ 
                            width: `${imageSize}px`,
                            height: `${imageSize}px`
                        }}>
                            <span>{__('Select Icon', 'custom-blocks')}</span>
                        </div>
                    )}
                    
                    <RichText
                        tagName="div"
                        className="icon-link-text"
                        value={linkText}
                        onChange={(content) => setAttributes({ linkText: content })}
                        placeholder={__('Enter link text...', 'custom-blocks')}
                    />
                </div>
                
                {!linkUrl && (
                    <p className="icon-link-notice">
                        {__('Set a link URL in the block settings', 'custom-blocks')}
                    </p>
                )}
            </div>
        </>
    );
}