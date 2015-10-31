<?php namespace Blupl\Venue\Http\Controllers\Admin;

use Blupl\Venue\Model\Venue;
use Illuminate\Support\Facades\Input;
use Orchestra\Foundation\Http\Controllers\AdminController;

class HomeController extends AdminController
{

    public function __construct()
    {
        parent::__construct();
    }

    protected function setupFilters()
    {
        $this->beforeFilter('control.csrf', ['only' => 'delete']);
    }

    /**
     * Get landing page.
     *
     * @return mixed
     */
    public function index()
    {
        return $this->processor->index($this);
    }

    public function indexSucceed(array $data)
    {
        set_meta('title', 'blupl/venue::title.venue');

        return view('blupl/venue::index', $data);
    }


    /**
     * Show a role.
     *
     * @param  int  $roles
     *
     * @return mixed
     */
    public function show($venue)
    {
        return $this->edit($venue);
    }

    /**
     * Create a new role.
     *
     * @return mixed
     */
    public function create()
    {
        return $this->processor->create($this);
    }

    /**
     * Edit the role.
     *
     * @param  int  $roles
     *
     * @return mixed
     */
     public function edit($venue)
     {
        return $this->processor->edit($this, $venue);
     }

    /**
     * Create the role.
     *
     * @return mixed
     */
     public function store()
     {
        return $this->processor->store($this, Input::all());
     }

    /**
     * Update the role.
     *
     * @param  int  $roles
     *
     * @return mixed
     */
    public function update($venue)
    {
        return $this->processor->update($this, Input::all(), $venue);
    }

    /**
     * Request to delete a role.
     *
     * @param  int  $roles
     *
     * @return mixed;
     */
    public function delete($venue)
    {
        return $this->destroy($venue);
    }

    /**
     * Request to delete a role.
     *
     * @param  int  $roles
     *
     * @return mixed
     */
    public function destroy($venue)
    {
        return $this->processor->destroy($this, $venue);
    }


    /**
     * Response when create role page succeed.
     *
     * @param  array  $data
     *
     * @return mixed
     */
    public function createSucceed(array $data)
    {
        set_meta('title', trans('blupl/venue::title.venue.create'));

        return view('blupl/venue::edit', $data);
    }

    /**
     * Response when edit role page succeed.
     *
     * @param  array  $data
     *
     * @return mixed
     */
    public function editSucceed(array $data)
    {
        set_meta('title', trans('blupl/venue::title.venue.update'));

        return view('blupl/venue::edit', $data);
    }

    /**
     * Response when storing role failed on validation.
     *
     * @param  object  $validation
     *
     * @return mixed
     */
     public function storeValidationFailed($validation)
     {
        return $this->redirectWithErrors(handles('orchestra::venue/reporter/create'), $validation);
     }

    /**
     * Response when storing role failed.
     *
     * @param  array  $error
     *
     * @return mixed
     */
     public function storeFailed(array $error)
     {
        $message = trans('orchestra/foundation::response.db-failed', $error);

        return $this->redirectWithMessage(handles('orchestra::venue/reporter'), $message);
     }

    /**
     * Response when storing user succeed.
     *
     * @param  \Orchestra\Model\Role  $role
     *
     * @return mixed
     */
     public function storeSucceed(venue $venue)
     {
        $message = trans('blupl/venue::response.venue.create', [
            'name' => $venue->getAttribute('name')
        ]);

            return $this->redirectWithMessage(handles('orchestra::venue/reporter'), $message);
     }

    /**
     * Response when updating role failed on validation.
     *
     * @param  object  $validation
     * @param  int     $id
     *
     * @return mixed
     */
     public function updateValidationFailed($validation, $id)
     {
        return $this->redirectWithErrors(handles("orchestra::venue/reporter/{$id}/edit"), $validation);
     }

    /**
     * Response when updating role failed.
     *
     * @param  array  $errors
     *
     * @return mixed
     */
     public function updateFailed(array $errors)
     {
        $message = trans('orchestra/foundation::response.db-failed', $errors);

        return $this->redirectWithMessage(handles('orchestra::venue/reporter'), $message);
     }

    /**
     * Response when updating role succeed.
     */
    public function updateSucceed(venue $venue)
    {
        $message = trans('orchestra/control::response.roles.update', [
            'name' => $venue->getAttribute('name')
        ]);

        return $this->redirectWithMessage(handles('orchestra::venue'), $message);
    }

    /**
     * Response when deleting role failed.
     *
     * @param  array  $error
     *
     * @return mixed
     */
    public function destroyFailed(array $error)
    {
        $message = trans('orchestra/foundation::response.db-failed', $error);

        return $this->redirectWithMessage(handles('orchestra::venue'), $message);
    }

    /**
     * Response when updating role succeed.
     *
     * @param  \Orchestra\Model\Role  $role
     *
     * @return mixed
     */
    public function destroySucceed(venue $venue)
    {
        $message = trans('orchestra/control::response.roles.delete', [
            'name' => $venue->getAttribute('name')
        ]);

   ;     return $this->redirectWithMessage(handles('orchestra::venue'), $message);
    }

    /**
     * Response when user verification failed.
     *
     * @return mixed
     */
    public function userVerificationFailed()
    {
        return $this->suspend(500);
    }

}