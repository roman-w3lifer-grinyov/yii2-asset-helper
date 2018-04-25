<?php

namespace w3lifer\yii2;

use Yii;

class AssetHelper
{
    /**
     * @return string
     */
    public static function getAbsoluteWebPathToJsFileByRoute()
    {
        $pathToJsFile = '/js/' . Yii::$app->controller->route . '.js';

        if (Yii::$app->assetManager->appendTimestamp) {
            $modificationTime =
                filemtime(
                    Yii::getAlias('@webroot') . '/' . $pathToJsFile
                );
            $pathToJsFile .= '?v=' . $modificationTime;
        }

        return $pathToJsFile;
    }
}
