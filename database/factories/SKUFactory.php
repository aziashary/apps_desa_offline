<?php

namespace Database\Factories;

use App\Models\SKU;
use Illuminate\Database\Eloquent\Factories\Factory;

class SKUFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SKU::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $MonthNow = date('M');
        $month_number = date("n",strtotime($MonthNow));

        $map = array('X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($month_number > 0) {
        foreach ($map as $roman => $int) {
            if($month_number >= $int) {
                $month_number -= $int;
                $returnValue .= $roman;
                break;
                }
            }
        }
        

        $yearNow = date('Y');

        return [
            'no_sku' => "510"." /"."  ".$this->faker->unique()->numberBetween(1, 500)."  "."/ ".$returnValue." / ".$yearNow,
            'id_warga' => $this->faker->numberBetween(1, 500),
            'jenis_usaha' => $this->faker->randomElement(['Aneka Gorengan','Rumah Makan','Toko','Warung','Kedai','Bengkel']),
            'alamat_usaha' => $this->faker->address
        ];
    }
}
