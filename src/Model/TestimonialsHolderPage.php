<?php

namespace ilateral\SilverStripe\Testimonials\Model;

use ilateral\SilverStripe\Testimonials\Control\TestimonialsHolderPageController;
use Page;
use SilverStripe\Forms\GridField\GridField;
use ilateral\SilverStripe\Testimonials\Model\Testimonial;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use SilverStripe\ORM\DataList;

class TestimonialsHolderPage extends Page 
{
    private static $table_name = "TestimonialsHolder";

    private static $controller_name = TestimonialsHolderPageController::class;

    private static $icon_class = 'font-icon-comment';

    private static $many_many = [
        "Testimonials" => Testimonial::class
    ];

    public function getCMSFields() 
    {
        $this->beforeUpdateCMSFields(function ($fields) {
            $fields->addFieldToTab(
                "Root.Testimonials",
                GridField::create(
                    "Testimonials",
                    $this->fieldLabel('Testimonials'),
                    $this->Testimonials(),
                    GridFieldConfig_RelationEditor::create()
                )
            );
        });

        return parent::getCMSFields();
    }

    public function getTestimonials()
    {
        return $this->Testimonials();
    }

    public function getRandomTestimonials(): DataList
    {
        return $this->Testimonials()->shuffle();
    }
}
