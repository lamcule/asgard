<?php

namespace Modules\Category\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Category\Entities\User;
use Modules\Category\Http\Requests\CreateUserRequest;
use Modules\Category\Http\Requests\UpdateUserRequest;
use Modules\Category\Repositories\UserRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class UserController extends AdminBaseController
{
    /**
     * @var UserRepository
     */
    private $user;

    public function __construct(UserRepository $user)
    {
        parent::__construct();

        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$users = $this->user->all();

        return view('category::admin.users.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('category::admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateUserRequest $request
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $this->user->create($request->all());

        return redirect()->route('admin.category.user.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('category::users.title.users')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return Response
     */
    public function edit(User $user)
    {
        return view('category::admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  User $user
     * @param  UpdateUserRequest $request
     * @return Response
     */
    public function update(User $user, UpdateUserRequest $request)
    {
        $this->user->update($user, $request->all());

        return redirect()->route('admin.category.user.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('category::users.title.users')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        $this->user->destroy($user);

        return redirect()->route('admin.category.user.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('category::users.title.users')]));
    }
}
