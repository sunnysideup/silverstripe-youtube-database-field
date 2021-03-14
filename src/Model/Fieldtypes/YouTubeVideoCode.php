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
     * Obfuscate all matching youtubes
     *
     * @return DBHTMLText
     */
    public function Embed(): DBHTMLText
    {
        return $this->Embed();
    }

    /**
     * Obfuscate all matching youtubes
     *
     * @return DBHTMLText
     */
    public function getEmbed(): DBHTMLText
    {
        $html = $this->renderWith(self::class . 'Embed');

        /** @var DBHTMLText */
        $var = DBHTMLText::create_field('HTMLText', $html);
        $var->RAW();
        return $var;
    }

    /**
     * @see DBField::scaffoldFormField()
     *
     * @param string $title (optional)
     * @param array $params (optional)
     *
     * @return YouTubeField|NullableField
     */
    public function scaffoldFormField($title = null, $params = null)
    {
        if (! $this->nullifyEmpty) {
            return NullableField::create(YouTubeField::create($this->name, $title));
        }
        return YoutubeField::create($this->name, $title);
    }
}
