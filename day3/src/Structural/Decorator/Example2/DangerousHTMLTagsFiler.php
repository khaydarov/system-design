<?php
declare(strict_types=1);

namespace App\Structural\Decorator\Example2;

/**
 * Class DangerousHTMLTagsFiler
 * @package App\Structural\Decorator\Example2
 */
class DangerousHTMLTagsFiler implements InputFormat
{
    private $dangerous_tag_patterns = [
        "|<script.*?>([\s\S]*)?</script>|i",
    ];

    private $dangerous_attributes = [
        "onclick", "onkeypress",
    ];

    /**
     * @param string $text
     * @return string
     */
    public function formatText(string $text): string
    {
        $text = $this->formatText($text);

        foreach ($this->dangerous_tag_patterns as $pattern) {
            $text = preg_replace($pattern, '', $text);
        }

        foreach ($this->dangerous_attributes as $attribute) {
            $text = preg_replace_callback('|<(.*?)>|', function ($matches) use ($attribute) {
                $result = preg_replace("|$attribute=|i", '', $matches[1]);
                return "<" . $result . ">";
            }, $text);
        }

        return $text;
    }
}