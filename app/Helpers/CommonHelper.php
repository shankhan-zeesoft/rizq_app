<?php

function getLang()
{
    return app()->getLocale();
}

function modalBox($title, $modal_id, $box_id, $modal_size = "modal-lg", $animation = "flip") //animation flip, zoom, ......
{
    try {
        $drawBox = '
            <div id="' . $modal_id . '" class="modal fade ' . $modal_size . ' ' . $animation . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="' . $modal_id . '" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">' . $title . '</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="' . trans('company.Close') . '"></button>
                        </div>
                        <div class="modal-body" id="' . $box_id . '">
                            <h4 class="text-center" id="loading_h">' . trans('company.Loading...') . '</h4>
                        </div>
                    </div>
                </div>
            </div>
        ';
        return $drawBox;
    } catch (Exception $ex) {
        return $ex;
    }
}
