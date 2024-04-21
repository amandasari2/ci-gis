<?php

namespace App\Controllers;

use App\Models\ModelHome;

class Home extends BaseController
{
    public function __construct()
    {
        $this->ModelHome = new ModelHome();
    }

    public function index(): string
    {
        $data = [
            'judul' => 'Dashboard',
            'page' => 'v_dashboard',
            'jumlahlokasi' => $this->ModelHome->JumlahLokasi(),
        ];
        return view('v_template', $data);
    }

    public function viewmap(): string
    {
        $data = [
            'judul' => 'View Map',
            'page' => 'v_viewmap',
        ];
        return view('v_template', $data);
    }

    public function basemap(): string
    {
        $data = [
            'judul' => 'Base Map',
            'page' => 'v_basemap',
        ];
        return view('v_template', $data);
    }

    public function marker(): string
    {
        $data = [
            'judul' => 'Marker',
            'page' => 'v_marker',
        ];
        return view('v_template', $data);
    }

    public function circle(): string
    {
        $data = [
            'judul' => 'Circle',
            'page' => 'v_circle',
        ];
        return view('v_template', $data);
    }

    public function polyline(): string
    {
        $data = [
            'judul' => 'Polyline',
            'page' => 'v_polyline',
        ];
        return view('v_template', $data);
    }

    public function polygon(): string
    {
        $data = [
            'judul' => 'Polygon',
            'page' => 'v_polygon',
        ];
        return view('v_template', $data);
    }

    public function geojson(): string
    {
        $data = [
            'judul' => 'GeoJSON',
            'page' => 'v_geojson',
        ];
        return view('v_template', $data);
    }

    public function getcoordinat(): string
    {
        $data = [
            'judul' => 'Get Coordinat',
            'page' => 'v_getcoordinat',
        ];
        return view('v_template', $data);
    }

    public function getcoordinat2(): string
    {
        $data = [
            'judul' => 'Get Coordinat Dalam Radius',
            'page' => 'v_getcoordinat2',
        ];
        return view('v_template', $data);
    }

    public function geolocation(): string
    {
        $data = [
            'judul' => 'Geo Location',
            'page' => 'v_geolocation',
        ];
        return view('v_template', $data);
    }

    public function rute(): string
    {
        $data = [
            'judul' => 'Rute',
            'page' => 'v_rute',
        ];
        return view('v_template', $data);
    }

    public function rute2(): string
    {
        $data = [
            'judul' => 'Rute Dari Lokasi User',
            'page' => 'v_rute2',
        ];
        return view('v_template', $data);
    }
}
