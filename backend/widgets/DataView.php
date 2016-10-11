<?php
/**
 * Created by IntelliJ IDEA.
 * User: suver
 * Date: 10.10.16
 * Time: 0:09
 */

namespace backend\widgets;


class DataView extends \yii\widgets\DetailView {

    public $template = '<div class="form-group"><label class="control-label"><div{captionOptions}>{label}</label></div></label><div class="well"><div{contentOptions}>{value}</div></div>';

}
