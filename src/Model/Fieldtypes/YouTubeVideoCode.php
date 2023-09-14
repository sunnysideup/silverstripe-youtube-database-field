<?php

namespace Sunnysideup\YouTubeDatabaseField\Model\Fieldtypes;

use EdgarIndustries\YouTubeField\YouTubeField;
use SilverStripe\Forms\NullableField;
use SilverStripe\ORM\FieldType\DBHTMLText;
use SilverStripe\ORM\FieldType\DBVarchar;

class YouTubeVideoCode extends DBVarchar
{
    private static $casting = [
        'Embed' => 'HTMLText',
    ];

    /**
     * Obfuscate all matching youtubes.
     */
    public function Embed(): DBHTMLText
    {
        return $this->getEmbed();
    }

    /**
     * Obfuscate all matching youtubes.
     */
    public function getEmbed(): DBHTMLText
    {
        $html = $this->renderWith(self::class . 'Embed');

        /** @var DBHTMLText $var */
        $var = DBHTMLText::create_field('HTMLText', $html);
        $var->RAW();

        return $var;
    }

    /**
     * @see DBField::scaffoldFormField()
     *
     * @param string $title  (optional)
     * @param array  $params (optional)
     *
     * @return NullableField|YouTubeField
     */
    public function scaffoldFormField($title = null, $params = null)
    {
        if (! $this->nullifyEmpty) {
            return NullableField::create(YouTubeField::create($this->name, $title));
        }

        return YoutubeField::create($this->name, $title);
    }
}
