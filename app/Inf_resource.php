<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Inf_resource
 *
 * @property int $id
 * @property int $org_id
 * @property int $catalog_item_id
 * @property int $privacy
 * @property int $integrity
 * @property int $availability
 * @property string $details
 * @property string $purpose
 * @property string $owner
 * @property string $holder
 * @property string $accountable
 * @method static \Illuminate\Database\Query\Builder|\App\Inf_resource whereAccountable($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Inf_resource whereAvailability($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Inf_resource whereCatalogItemId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Inf_resource whereDetails($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Inf_resource whereHolder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Inf_resource whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Inf_resource whereIntegrity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Inf_resource whereOrgId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Inf_resource whereOwner($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Inf_resource wherePrivacy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Inf_resource wherePurpose($value)
 * @mixin \Eloquent
 * @property int $organisation_id
 * @property int $contract_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\CatalogItem $_inf_resource
 * @property-read \App\Organisation $_organisation
 * @method static \Illuminate\Database\Query\Builder|\App\Inf_resource whereContractId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Inf_resource whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Inf_resource whereOrganisationId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Inf_resource whereUpdatedAt($value)
 */
class Inf_resource extends Model
{
    protected $table = 'inf_resources';

    public $privacyColumn      = [1 => 'ПДн', 2 => 'К', 3 => 'Ц'];
    public $integrityColumn    = [1 => 'Выс', 2 => 'Низ', 3 => 'Нет'];
    public $availabilityColumn = [1 => 'Р', 2 => 'Ч', 3 => 'Д', 4 => 'Н'];

/*
 * ОРГАНИЗАЦИЯ-ВЛАДЕЛЕЦ
 */
    public function _organisation()
    {
        return $this->belongsTo(Organisation::class,'organisation_id');
    }

/*
 * ВИД ДОГОВОРА
 */
    public function _inf_resource()
    {
        return $this->belongsTo(CatalogItem::class,'catalog_item_id');
    }
}
