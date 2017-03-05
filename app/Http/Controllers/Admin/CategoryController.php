<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Barryvdh\Form\ValidatesForms;
use Barryvdh\Form\CreatesForms;

class CategoryController extends Controller
{

    use ValidatesForms, CreatesForms;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request, FormFactoryInterface $factory)
    {
        $category = new Category();

        $form = $this->createFormBuilder($category)
            ->add('name', TextType::class)
            ->add('description', TextareaType::class)
            ->add('color', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Guardar categoria'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $this->validateForm($form, $request, [
                'name' => 'required|unique:categories,name',
                'description' => 'required',
                'color' => 'required',
            ]);
            $category->slug = str_slug($category->name);

            $category->save();
            return redirect()->route('category.index')->with('message', 'categoria creada correctament');
        }

        $form = $form->createView();

        return view('admin.category.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Category $category)
    {
        $form = $this->createFormBuilder($category)
            ->add('name', TextType::class)
            ->add('description', TextareaType::class)
            ->add('color', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Guardar categoria'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $this->validateForm($form, $request, [
                'name' => 'required',
                'description' => 'required',
                'color' => 'required',
            ]);
            $category->slug = str_slug($category->name);

            $category->update();
            return redirect()->route('category.index')->with('message', 'categoria actualitzada correctament');
        }

        $form = $form->createView();

        return view('admin.category.create', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $deleted = $category->delete();
        $message = $deleted ? 'Categoria eliminada correctament!' : 'La Categoria NO s´ha pogut eliminar!';
        return redirect()->route('category.index')->with('message', $message);
    }
}
