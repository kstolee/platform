<?php

/**
 * Ushahidi API Formatter for Tag
 *
 * @author     Ushahidi Team <team@ushahidi.com>
 * @package    Ushahidi\Application
 * @copyright  2014 Ushahidi
 * @license    https://www.gnu.org/licenses/agpl-3.0.html GNU Affero General Public License Version 3 (AGPL3)
 */

namespace Ushahidi\App\Formatter;

use Ushahidi\Core\Traits\FormatterAuthorizerMetadata;

class Tag extends API
{
	use FormatterAuthorizerMetadata;

	protected function format_color($value)
	{
		// enforce a leading hash on color, or null if unset
		$value = ltrim($value, '#');
		return $value ? '#' . $value : null;
	}

     protected function format_forms($forms)
    {
        $output = [];
        foreach ($forms as $formid)
        {
            $output[] = $this->get_relation('forms', $formid);
        }

        return $output;
    }
}