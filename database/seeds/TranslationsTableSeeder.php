<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Page;
use TCG\Voyager\Models\Translation;

class TranslationsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $this->dataTypesTranslations();
        $this->dataTypesTranslationsSpanish();
        $this->menusTranslations();
        $this->menusTranslationsSpanish();
    }

    /**
     * Auto generate DataTypes Translations.
     *
     * @return void
     */
    private function dataTypesTranslations()
    {
        // Adding translations for 'display_name_singular'
        //
        $_fld = 'display_name_singular';
        $_tpl = ['data_types', $_fld];
        $dtp = DataType::where($_fld, 'Post')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Post');
        }
        $dtp = DataType::where($_fld, 'Page')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Página');
        }
        $dtp = DataType::where($_fld, 'User')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Utilizador');
        }
        $dtp = DataType::where($_fld, 'Category')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Categoria');
        }
        $dtp = DataType::where($_fld, 'Menu')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Menu');
        }
        $dtp = DataType::where($_fld, 'Role')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Função');
        }

        // Adding translations for 'display_name_plural'
        //
        $_fld = 'display_name_plural';
        $_tpl = ['data_types', $_fld];
        $dtp = DataType::where($_fld, 'Posts')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Posts');
        }
        $dtp = DataType::where($_fld, 'Pages')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Páginas');
        }
        $dtp = DataType::where($_fld, 'Users')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Utilizadores');
        }
        $dtp = DataType::where($_fld, 'Categories')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Categorias');
        }
        $dtp = DataType::where($_fld, 'Menus')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Menus');
        }
        $dtp = DataType::where($_fld, 'Roles')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('pt', $this->arr($_tpl, $dtp->id), 'Funções');
        }
    }

    private function dataTypesTranslationsSpanish()
    {
        // Adding translations for 'display_name_singular'
        //
        $_fld = 'display_name_singular';
        $_tpl = ['data_types', $_fld];
        $dtp = DataType::where($_fld, 'Post')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('es', $this->arr($_tpl, $dtp->id), 'Publicación');
        }
        $dtp = DataType::where($_fld, 'Page')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('es', $this->arr($_tpl, $dtp->id), 'Página');
        }
        $dtp = DataType::where($_fld, 'User')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('es', $this->arr($_tpl, $dtp->id), 'Usuario');
        }
        $dtp = DataType::where($_fld, 'Category')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('es', $this->arr($_tpl, $dtp->id), 'Categoría');
        }
        $dtp = DataType::where($_fld, 'Menu')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('es', $this->arr($_tpl, $dtp->id), 'Menú');
        }
        $dtp = DataType::where($_fld, 'Role')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('es', $this->arr($_tpl, $dtp->id), 'Rol');
        }

        // Adding translations for 'display_name_plural'
        //
        $_fld = 'display_name_plural';
        $_tpl = ['data_types', $_fld];
        $dtp = DataType::where($_fld, 'Posts')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('es', $this->arr($_tpl, $dtp->id), 'Publicaciones');
        }
        $dtp = DataType::where($_fld, 'Pages')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('es', $this->arr($_tpl, $dtp->id), 'Páginas');
        }
        $dtp = DataType::where($_fld, 'Users')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('es', $this->arr($_tpl, $dtp->id), 'Usuarios');
        }
        $dtp = DataType::where($_fld, 'Categories')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('es', $this->arr($_tpl, $dtp->id), 'Categorías');
        }
        $dtp = DataType::where($_fld, 'Menus')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('es', $this->arr($_tpl, $dtp->id), 'Menus');
        }
        $dtp = DataType::where($_fld, 'Roles')->firstOrFail();
        if ($dtp->exists) {
            $this->trans('es', $this->arr($_tpl, $dtp->id), 'Roles');
        }
    }

    /**
     * Auto generate Menus Translations.
     *
     * @return void
     */
    private function menusTranslations()
    {
        $_tpl = ['menu_items', 'title'];
        $_item = $this->mItem('Dashboard');
        if ($_item->exists) {
            $this->trans('pt', $this->arr($_tpl, $_item->id), 'Painel de Controle');
        }

        $_item = $this->mItem('Media');
        if ($_item->exists) {
            $this->trans('pt', $this->arr($_tpl, $_item->id), 'Media');
        }

        $_item = $this->mItem('Posts');
        if ($_item->exists) {
            $this->trans('pt', $this->arr($_tpl, $_item->id), 'Publicações');
        }

        $_item = $this->mItem('Users');
        if ($_item->exists) {
            $this->trans('pt', $this->arr($_tpl, $_item->id), 'Utilizadores');
        }

        $_item = $this->mItem('Categories');
        if ($_item->exists) {
            $this->trans('pt', $this->arr($_tpl, $_item->id), 'Categorias');
        }

        $_item = $this->mItem('Pages');
        if ($_item->exists) {
            $this->trans('pt', $this->arr($_tpl, $_item->id), 'Páginas');
        }

        $_item = $this->mItem('Roles');
        if ($_item->exists) {
            $this->trans('pt', $this->arr($_tpl, $_item->id), 'Funções');
        }

        $_item = $this->mItem('Tools');
        if ($_item->exists) {
            $this->trans('pt', $this->arr($_tpl, $_item->id), 'Ferramentas');
        }

        $_item = $this->mItem('Menu Builder');
        if ($_item->exists) {
            $this->trans('pt', $this->arr($_tpl, $_item->id), 'Menus');
        }

        $_item = $this->mItem('Database');
        if ($_item->exists) {
            $this->trans('pt', $this->arr($_tpl, $_item->id), 'Base de dados');
        }

        $_item = $this->mItem('Settings');
        if ($_item->exists) {
            $this->trans('pt', $this->arr($_tpl, $_item->id), 'Configurações');
        }
    }

    /**
     * Auto generate Menus Translations.
     *
     * @return void
     */
    private function menusTranslationsSpanish()
    {
        $_tpl = ['menu_items', 'title'];
        $_item = $this->mItem('Dashboard');
        if ($_item->exists) {
            $this->trans('es', $this->arr($_tpl, $_item->id), 'Panel de Control');
        }

        $_item = $this->mItem('Media');
        if ($_item->exists) {
            $this->trans('es', $this->arr($_tpl, $_item->id), 'Media');
        }

        $_item = $this->mItem('Posts');
        if ($_item->exists) {
            $this->trans('es', $this->arr($_tpl, $_item->id), 'Publicaciones');
        }

        $_item = $this->mItem('Users');
        if ($_item->exists) {
            $this->trans('es', $this->arr($_tpl, $_item->id), 'Usuarios');
        }

        $_item = $this->mItem('Categories');
        if ($_item->exists) {
            $this->trans('es', $this->arr($_tpl, $_item->id), 'Categorias');
        }

        $_item = $this->mItem('Pages');
        if ($_item->exists) {
            $this->trans('es', $this->arr($_tpl, $_item->id), 'Páginas');
        }

        $_item = $this->mItem('Roles');
        if ($_item->exists) {
            $this->trans('es', $this->arr($_tpl, $_item->id), 'Roles');
        }

        $_item = $this->mItem('Tools');
        if ($_item->exists) {
            $this->trans('es', $this->arr($_tpl, $_item->id), 'Herramientas');
        }

        $_item = $this->mItem('Menu Builder');
        if ($_item->exists) {
            $this->trans('es', $this->arr($_tpl, $_item->id), 'Constructor de Menú');
        }

        $_item = $this->mItem('Database');
        if ($_item->exists) {
            $this->trans('es', $this->arr($_tpl, $_item->id), 'Base de datos');
        }

        $_item = $this->mItem('Settings');
        if ($_item->exists) {
            $this->trans('es', $this->arr($_tpl, $_item->id), 'Configuraciones');
        }
    }

    private function mItem($title)
    {
        return MenuItem::where('title', $title)->firstOrFail();
    }

    private function arr($par, $id)
    {
        return [
            'table_name'  => $par[0],
            'column_name' => $par[1],
            'foreign_key' => $id,
        ];
    }

    private function trans($lang, $keys, $value)
    {
        $_t = Translation::firstOrNew(array_merge($keys, [
            'locale' => $lang,
        ]));

        if (!$_t->exists) {
            $_t->fill(array_merge(
                $keys,
                ['value' => $value]
            ))->save();
        }
    }
}
