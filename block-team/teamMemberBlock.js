const { registerBlockType } = wp.blocks;
const { RichText, InspectorControls } = wp.blockEditor;
const { TextControl, PanelBody, PanelRow, Button } = wp.components;

export default registerBlockType('custom/team-member', {
  title: 'Team Member',
  icon: 'admin-users',
  category: 'common',
  attributes: {
    name: { type: 'string' },
    title: { type: 'string' },
    details: { type: 'string' },
    showDetails: { type: 'boolean', default: false },
  },
  edit: ({ attributes, setAttributes }) => {
    const { name, title, details, showDetails } = attributes;

    const toggleDetails = () => {
      setAttributes({ showDetails: !showDetails });
    };

    return (
      <div className="team-member">
        <InspectorControls>
          <PanelBody title="Team Member Details" initialOpen={true}>
            <PanelRow>
              <TextControl
                label="Name"
                value={name}
                onChange={(value) => setAttributes({ name: value })}
              />
            </PanelRow>
            <PanelRow>
              <TextControl
                label="Title"
                value={title}
                onChange={(value) => setAttributes({ title: value })}
              />
            </PanelRow>
            <PanelRow>
              <TextControl
                label="Details"
                value={details}
                onChange={(value) => setAttributes({ details: value })}
              />
            </PanelRow>
          </PanelBody>
        </InspectorControls>

        <div className="team-member__info">
          <h3>{name}</h3>
          <p>{title}</p>
          <Button isPrimary onClick={toggleDetails}>
            {showDetails ? 'Hide Details' : 'View Details'}
          </Button>
          {showDetails && <div className="team-member__details">{details}</div>}
        </div>
      </div>
    );
  },
  save: ({ attributes }) => {
    const { name, title, details, showDetails } = attributes;

    return (
      <div className="team-member">
        <div className="team-member__info">
          <h3>{name}</h3>
          <p>{title}</p>
          <button
            onClick={(e) => {
              e.currentTarget.nextElementSibling.classList.toggle('is-visible');
            }}
          >
            {showDetails ? 'Hide Details' : 'View Details'}
          </button>
          <div
            className={`team-member__details ${
              showDetails ? 'is-visible' : ''
            }`}
          >
            {details}
          </div>
        </div>
      </div>
    );
  },
});
