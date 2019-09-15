<?php


namespace App;


use Illuminate\Support\Facades\Auth;

trait RecordsActivity{

    public $oldAttributes = [];


    public static function bootRecordsActivity(){

        foreach(self::recordableEvents() as $event){
            static::$event(function($model) use ($event){
                $model->recordActivity($model->activityDescription($event));
            });

            if($event === 'updated'){
                static::updating(function($model){
                    $model->oldAttributes = $model->getOriginal();
                });
            }
        }
    }



    protected function activityDescription($description){

        return "{$description}_" . strtolower(class_basename($this));
    }



    /**
     * @return array|mixed
     */
    public static function recordableEvents()
    {
        if (isset(static::$recordableEvents)) {
            return static::$recordableEvents;
        }
            return ['created', 'updated', 'deleted'];
    }



    public function activity(){

        return $this->morphMany(Activity::class,'subject')->latest();
    }



    public function recordActivity($description){

        $this->activity()->create([
            'user_id' => auth()->id(),
            'description' => $description,
            'changes' => $this->activityChanges(),
            'project_id' => class_basename($this) === 'Project' ? $this->id : $this->project_id,
        ]);
    }



    protected function activityChanges(){

        if($this->wasChanged()){
            return [
                'before' => array_diff($this->oldAttributes,$this->getAttributes()),
                'after' => $this->getChanges()
            ];
        }

        return null;
    }
}
