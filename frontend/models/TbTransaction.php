<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_transaction".
 *
 * @property string $grouploc
 * @property string $Lab_No
 * @property int $ComponentID
 * @property int $customer_id
 * @property string $name
 * @property string $address
 * @property string $branch
 * @property int $unit_id
 * @property string $UNIT_NO
 * @property string $MODEL
 * @property string $COMPONENT
 * @property string $OIL_TYPE
 * @property string $OIL_MATRIX
 * @property string $ORIG_VISC
 * @property string $SAMPL_DT1
 * @property string $RECV_DT1
 * @property string $RPT_DT1
 * @property string $HRS_KM_OH
 * @property string $HRS_KM_OC
 * @property string $HRS_KM_TOT
 * @property string $oil_change
 * @property string $REFF
 * @property double $ZDDP
 * @property string $PCCek
 * @property double $VISC_CST
 * @property string $CST_CODE
 * @property int $visc_index
 * @property string $visc_index_code
 * @property double $VISC_SAE
 * @property string $SAE_CODE
 * @property double $DILUTION
 * @property string $DILUT_CODE
 * @property double $DIR_TRANS
 * @property string $TRANS_CODE
 * @property double $OXIDATION
 * @property string $OXID_CODE
 * @property double $NITRATION
 * @property string $NITR_CODE
 * @property double $WATER
 * @property string $WTR_CODE
 * @property double $T_A_N
 * @property string $TAN_CODE
 * @property double $T_B_N
 * @property string $TBN_CODE
 * @property string $ADD_PHYS
 * @property double $ADD_VALUE
 * @property string $ADD_CODE
 * @property double $NICKEL
 * @property string $NI_CODE
 * @property double $SOX
 * @property string $SOX_CODE
 * @property double $GLYCOL
 * @property string $GLY_CODE
 * @property double $SILICON
 * @property string $SI_CODE
 * @property double $IRON
 * @property double $IRON_CONV
 * @property string $FE_CODE
 * @property double $COPPER
 * @property double $COPPER_CONV
 * @property string $CU_CODE
 * @property double $ALUMINIUM
 * @property double $ALUMUNIUM_CONV
 * @property string $AL_CODE
 * @property double $CHROMIUM
 * @property double $CHROMIUM_CONV
 * @property string $CR_CODE
 * @property double $MAGNESIUM
 * @property string $MG_CODE
 * @property double $SILVER
 * @property string $AG_CODE
 * @property double $TIN
 * @property string $SN_CODE
 * @property double $LEAD
 * @property double $LEAD_CONV
 * @property string $NA_CODE
 * @property string $PB_CODE
 * @property double $SODIUM
 * @property double $SODIUM_CONV
 * @property double $CALCIUM
 * @property string $CA_CODE
 * @property double $ZINC
 * @property string $ZN_CODE
 * @property string $ADD_MET
 * @property double $ADD_MVAL
 * @property string $ADD_MCODE
 * @property string $EVAL_CODE
 * @property string $UT_EMD
 * @property string $UT_ESN
 * @property string $RECOMM1
 * @property string $RECOMM2
 * @property string $RECOMM3
 * @property string $RECOMM4
 * @property string $MATRIX
 * @property double $Molybdenum
 * @property string $Molybdenum_CODE
 * @property double $Boron
 * @property string $Boron_CODE
 * @property double $Potassium
 * @property string $Potassium_CODE
 * @property double $Barium
 * @property string $Barium_CODE
 * @property double $4um
 * @property string $4um_code
 * @property double $6um
 * @property string $6um_code
 * @property double $15um
 * @property string $15um_code
 * @property string $ISO4406
 * @property string $ISO4406_CODE
 * @property double $PQIndex
 * @property string $PQIndex_CODE
 * @property string $colourcode
 * @property string $colourcode_CODE
 * @property double $phosphor
 * @property string $phosphor_code
 * @property double $sulphur
 * @property double $visc_40
 * @property string $visc_40_code
 * @property string $seq_I
 * @property string $seq_I_code
 * @property string $seq_II
 * @property string $seq_II_code
 * @property string $seq_III
 * @property string $seq_III_code
 * @property string $filter_code
 * @property string $filter_desc
 * @property string $magnetic_code
 * @property string $magnetic_desc
 * @property double $KarlFischer
 * @property double $RubbingWearSize
 * @property string $RubbingWearConc
 * @property double $CuttingWearSize
 * @property string $CuttingWearConc
 * @property double $ScuffingWearSize
 * @property string $ScuffingWearConc
 * @property double $FatigueWearSize
 * @property string $FatigueWearConc
 * @property double $FatigueLaminarSize
 * @property string $FatigueLaminarConc
 * @property double $SpheresSize
 * @property string $SpheresConc
 * @property double $DarkOxidesSize
 * @property string $DarkOxidesConc
 * @property double $RedOxidesSize
 * @property string $RedOxidesConc
 * @property double $NonFerrousSize
 * @property string $NonFerrousConc
 * @property double $MiscDustSize
 * @property string $MiscDustConc
 * @property string $Notes
 */
class TbTransaction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_transaction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Lab_No', 'ComponentID', 'name', 'branch', 'unit_id'], 'required'],
            [['ComponentID', 'customer_id', 'unit_id', 'visc_index'], 'integer'],
            [['ORIG_VISC', 'HRS_KM_OH', 'HRS_KM_OC', 'HRS_KM_TOT', 'ZDDP', 'VISC_CST', 'VISC_SAE', 'DILUTION', 'DIR_TRANS', 'OXIDATION', 'NITRATION', 'WATER', 'T_A_N', 'T_B_N', 'ADD_VALUE', 'NICKEL', 'SOX', 'GLYCOL', 'SILICON', 'IRON', 'IRON_CONV', 'COPPER', 'COPPER_CONV', 'ALUMINIUM', 'ALUMUNIUM_CONV', 'CHROMIUM', 'CHROMIUM_CONV', 'MAGNESIUM', 'SILVER', 'TIN', 'LEAD', 'LEAD_CONV', 'SODIUM', 'SODIUM_CONV', 'CALCIUM', 'ZINC', 'ADD_MVAL', 'Molybdenum', 'Boron', 'Potassium', 'Barium', '4um', '6um', '15um', 'PQIndex', 'phosphor', 'sulphur', 'visc_40', 'KarlFischer', 'RubbingWearSize', 'CuttingWearSize', 'ScuffingWearSize', 'FatigueWearSize', 'FatigueLaminarSize', 'SpheresSize', 'DarkOxidesSize', 'RedOxidesSize', 'NonFerrousSize', 'MiscDustSize'], 'number'],
            [['SAMPL_DT1', 'RECV_DT1', 'RPT_DT1'], 'safe'],
            [['RECOMM1', 'RECOMM2', 'RECOMM3', 'RECOMM4', 'phosphor_code'], 'string'],
            [['grouploc', 'ADD_PHYS', 'ADD_MET', 'UT_EMD', 'UT_ESN', 'MATRIX'], 'string', 'max' => 15],
            [['Lab_No', 'ISO4406', 'colourcode', 'seq_I', 'seq_II', 'seq_III', 'RubbingWearConc', 'CuttingWearConc', 'ScuffingWearConc', 'FatigueWearConc', 'FatigueLaminarConc', 'SpheresConc', 'DarkOxidesConc', 'RedOxidesConc', 'NonFerrousConc', 'MiscDustConc'], 'string', 'max' => 10],
            [['name', 'address', 'branch'], 'string', 'max' => 50],
            [['UNIT_NO', 'MODEL'], 'string', 'max' => 25],
            [['COMPONENT', 'REFF'], 'string', 'max' => 30],
            [['OIL_TYPE', 'OIL_MATRIX', 'SAE_CODE'], 'string', 'max' => 20],
            [['oil_change'], 'string', 'max' => 3],
            [['PCCek'], 'string', 'max' => 5],
            [['CST_CODE', 'visc_40_code'], 'string', 'max' => 2],
            [['visc_index_code', 'DILUT_CODE', 'TRANS_CODE', 'OXID_CODE', 'NITR_CODE', 'WTR_CODE', 'TAN_CODE', 'TBN_CODE', 'ADD_CODE', 'NI_CODE', 'SOX_CODE', 'GLY_CODE', 'SI_CODE', 'FE_CODE', 'CU_CODE', 'AL_CODE', 'CR_CODE', 'MG_CODE', 'AG_CODE', 'SN_CODE', 'NA_CODE', 'PB_CODE', 'CA_CODE', 'ZN_CODE', 'ADD_MCODE', 'EVAL_CODE', 'Molybdenum_CODE', 'Potassium_CODE', 'Barium_CODE', '4um_code', '6um_code', '15um_code', 'ISO4406_CODE', 'PQIndex_CODE', 'colourcode_CODE', 'seq_I_code', 'seq_II_code', 'seq_III_code'], 'string', 'max' => 1],
            [['Boron_CODE'], 'string', 'max' => 8],
            [['filter_code', 'magnetic_code'], 'string', 'max' => 100],
            [['filter_desc', 'magnetic_desc', 'Notes'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'grouploc' => 'Grouploc',
            'Lab_No' => 'Lab  No',
            'ComponentID' => 'Component ID',
            'customer_id' => 'Customer ID',
            'name' => 'Name',
            'address' => 'Address',
            'branch' => 'Branch',
            'unit_id' => 'Unit ID',
            'UNIT_NO' => 'Unit  No',
            'MODEL' => 'Model',
            'COMPONENT' => 'Component',
            'OIL_TYPE' => 'Oil  Type',
            'OIL_MATRIX' => 'Oil  Matrix',
            'ORIG_VISC' => 'Orig  Visc',
            'SAMPL_DT1' => 'Sampl  Dt1',
            'RECV_DT1' => 'Recv  Dt1',
            'RPT_DT1' => 'Rpt  Dt1',
            'HRS_KM_OH' => 'Hrs  Km  Oh',
            'HRS_KM_OC' => 'Hrs  Km  Oc',
            'HRS_KM_TOT' => 'Hrs  Km  Tot',
            'oil_change' => 'Oil Change',
            'REFF' => 'Reff',
            'ZDDP' => 'Zddp',
            'PCCek' => 'Pccek',
            'VISC_CST' => 'Visc  Cst',
            'CST_CODE' => 'Cst  Code',
            'visc_index' => 'Visc Index',
            'visc_index_code' => 'Visc Index Code',
            'VISC_SAE' => 'Visc  Sae',
            'SAE_CODE' => 'Sae  Code',
            'DILUTION' => 'Dilution',
            'DILUT_CODE' => 'Dilut  Code',
            'DIR_TRANS' => 'Dir  Trans',
            'TRANS_CODE' => 'Trans  Code',
            'OXIDATION' => 'Oxidation',
            'OXID_CODE' => 'Oxid  Code',
            'NITRATION' => 'Nitration',
            'NITR_CODE' => 'Nitr  Code',
            'WATER' => 'Water',
            'WTR_CODE' => 'Wtr  Code',
            'T_A_N' => 'T  A  N',
            'TAN_CODE' => 'Tan  Code',
            'T_B_N' => 'T  B  N',
            'TBN_CODE' => 'Tbn  Code',
            'ADD_PHYS' => 'Add  Phys',
            'ADD_VALUE' => 'Add  Value',
            'ADD_CODE' => 'Add  Code',
            'NICKEL' => 'Nickel',
            'NI_CODE' => 'Ni  Code',
            'SOX' => 'Sox',
            'SOX_CODE' => 'Sox  Code',
            'GLYCOL' => 'Glycol',
            'GLY_CODE' => 'Gly  Code',
            'SILICON' => 'Silicon',
            'SI_CODE' => 'Si  Code',
            'IRON' => 'Iron',
            'IRON_CONV' => 'Iron  Conv',
            'FE_CODE' => 'Fe  Code',
            'COPPER' => 'Copper',
            'COPPER_CONV' => 'Copper  Conv',
            'CU_CODE' => 'Cu  Code',
            'ALUMINIUM' => 'Aluminium',
            'ALUMUNIUM_CONV' => 'Alumunium  Conv',
            'AL_CODE' => 'Al  Code',
            'CHROMIUM' => 'Chromium',
            'CHROMIUM_CONV' => 'Chromium  Conv',
            'CR_CODE' => 'Cr  Code',
            'MAGNESIUM' => 'Magnesium',
            'MG_CODE' => 'Mg  Code',
            'SILVER' => 'Silver',
            'AG_CODE' => 'Ag  Code',
            'TIN' => 'Tin',
            'SN_CODE' => 'Sn  Code',
            'LEAD' => 'Lead',
            'LEAD_CONV' => 'Lead  Conv',
            'NA_CODE' => 'Na  Code',
            'PB_CODE' => 'Pb  Code',
            'SODIUM' => 'Sodium',
            'SODIUM_CONV' => 'Sodium  Conv',
            'CALCIUM' => 'Calcium',
            'CA_CODE' => 'Ca  Code',
            'ZINC' => 'Zinc',
            'ZN_CODE' => 'Zn  Code',
            'ADD_MET' => 'Add  Met',
            'ADD_MVAL' => 'Add  Mval',
            'ADD_MCODE' => 'Add  Mcode',
            'EVAL_CODE' => 'Eval  Code',
            'UT_EMD' => 'Ut  Emd',
            'UT_ESN' => 'Ut  Esn',
            'RECOMM1' => 'Recomm1',
            'RECOMM2' => 'Recomm2',
            'RECOMM3' => 'Recomm3',
            'RECOMM4' => 'Recomm4',
            'MATRIX' => 'Matrix',
            'Molybdenum' => 'Molybdenum',
            'Molybdenum_CODE' => 'Molybdenum  Code',
            'Boron' => 'Boron',
            'Boron_CODE' => 'Boron  Code',
            'Potassium' => 'Potassium',
            'Potassium_CODE' => 'Potassium  Code',
            'Barium' => 'Barium',
            'Barium_CODE' => 'Barium  Code',
            '4um' => '4um',
            '4um_code' => '4um Code',
            '6um' => '6um',
            '6um_code' => '6um Code',
            '15um' => '15um',
            '15um_code' => '15um Code',
            'ISO4406' => 'Iso4406',
            'ISO4406_CODE' => 'Iso4406  Code',
            'PQIndex' => 'Pqindex',
            'PQIndex_CODE' => 'Pqindex  Code',
            'colourcode' => 'Colourcode',
            'colourcode_CODE' => 'Colourcode  Code',
            'phosphor' => 'Phosphor',
            'phosphor_code' => 'Phosphor Code',
            'sulphur' => 'Sulphur',
            'visc_40' => 'Visc 40',
            'visc_40_code' => 'Visc 40 Code',
            'seq_I' => 'Seq  I',
            'seq_I_code' => 'Seq  I Code',
            'seq_II' => 'Seq  Ii',
            'seq_II_code' => 'Seq  Ii Code',
            'seq_III' => 'Seq  Iii',
            'seq_III_code' => 'Seq  Iii Code',
            'filter_code' => 'Filter Code',
            'filter_desc' => 'Filter Desc',
            'magnetic_code' => 'Magnetic Code',
            'magnetic_desc' => 'Magnetic Desc',
            'KarlFischer' => 'Karl Fischer',
            'RubbingWearSize' => 'Rubbing Wear Size',
            'RubbingWearConc' => 'Rubbing Wear Conc',
            'CuttingWearSize' => 'Cutting Wear Size',
            'CuttingWearConc' => 'Cutting Wear Conc',
            'ScuffingWearSize' => 'Scuffing Wear Size',
            'ScuffingWearConc' => 'Scuffing Wear Conc',
            'FatigueWearSize' => 'Fatigue Wear Size',
            'FatigueWearConc' => 'Fatigue Wear Conc',
            'FatigueLaminarSize' => 'Fatigue Laminar Size',
            'FatigueLaminarConc' => 'Fatigue Laminar Conc',
            'SpheresSize' => 'Spheres Size',
            'SpheresConc' => 'Spheres Conc',
            'DarkOxidesSize' => 'Dark Oxides Size',
            'DarkOxidesConc' => 'Dark Oxides Conc',
            'RedOxidesSize' => 'Red Oxides Size',
            'RedOxidesConc' => 'Red Oxides Conc',
            'NonFerrousSize' => 'Non Ferrous Size',
            'NonFerrousConc' => 'Non Ferrous Conc',
            'MiscDustSize' => 'Misc Dust Size',
            'MiscDustConc' => 'Misc Dust Conc',
            'Notes' => 'Notes',
        ];
    }
}
