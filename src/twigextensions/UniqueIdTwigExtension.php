<?php
/**
 * UniqueId
 *
 * @link      https://github.com/russell-kitchen
 * @copyright https://craftcms.stackexchange.com/questions/29628/give-included-twig-component-unique-id/29629#29629
 */
namespace russellkitchen\uniqueid\twigextensions;
use russellkitchen\uniqueid\UniqueId;
use Craft;
use Twig_Function;
/**
 * @package UniqueId
 * @since 3.0.0
 */
class UniqueIdTwigExtension extends \Twig_Extension implements \Twig_Extension_GlobalsInterface
{
    public $uniqueIds;

    public function getFunctions(): array
    {
        return [
             new Twig_SimpleFunction('uniqueId', [$this, 'getUniqueId'])
        ];
    }

    /**
     * getUniqueId
     *
     * @return string
     */
    public function getUniqueId(): string
    {
        // generate a random string
        $id = StringHelper::randomString('12');

        // check if it's already set
        while (\in_array($id, $this->uniqueIds, true)){
            // if so, use another one
            $id = StringHelper::randomString('12');
        }
        // set it as "used"
        $this->uniqueIds[] = $id;

        return $id;
    }
}
