<?php

namespace CodeCommerce\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('estados', [ 
        ''  =>'Selecione',           'AC'=>'Acre',              'AL'=>'Alagoas',   'AP'=>'Amapá',
        'AM'=>'Amazonas',            'BA'=>'Bahia',             'CE'=>'Ceará',     'DF'=>'Distrito Federal',
        'ES'=>'Espírito Santo',      'GO'=>'Goiás',             'MA'=>'Maranhão',  'MT'=>'Mato Grosso',
        'MS'=>'Mato Grosso do Sul',  'MG'=>'Minas Gerais',      'PA'=>'Pará',      'PB'=>'Paraíba',
        'PR'=>'Parána',              'PE'=>'Pernambuco',        'PI'=>'Piauí',     'RJ'=>'Rio de Janeiro',
        'RN'=>'Rio Grande do Norte', 'RS'=>'Rio Grande do Sul', 'RO'=>'Rondônia',  'RR'=>'Roraima',
        'SC'=>'Santa Catarina',      'SE'=>'Sergipe',           'SP'=>'São Paulo', 'TO'=>'Tocantins']);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
