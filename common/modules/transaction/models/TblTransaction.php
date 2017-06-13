<?php

namespace common\modules\transaction\models;

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
 * @property string $PB_CODE
 * @property double $SODIUM
 * @property double $SODIUM_CONV
 * @property string $NA_CODE
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
class TblTransaction extends \yii\db\ActiveRecord
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
            [['visc_index_code', 'DILUT_CODE', 'TRANS_CODE', 'OXID_CODE', 'NITR_CODE', 'WTR_CODE', 'TAN_CODE', 'TBN_CODE', 'ADD_CODE', 'NI_CODE', 'SOX_CODE', 'GLY_CODE', 'SI_CODE', 'FE_CODE', 'CU_CODE', 'AL_CODE', 'CR_CODE', 'MG_CODE', 'AG_CODE', 'SN_CODE', 'PB_CODE', 'NA_CODE', 'CA_CODE', 'ZN_CODE', 'ADD_MCODE', 'EVAL_CODE', 'Molybdenum_CODE', 'Potassium_CODE', 'Barium_CODE', '4um_code', '6um_code', '15um_code', 'ISO4406_CODE', 'PQIndex_CODE', 'colourcode_CODE', 'seq_I_code', 'seq_II_code', 'seq_III_code'], 'string', 'max' => 1],
            [['Boron_CODE'], 'string', 'max' => 8],
            [['filter_code', 'magnetic_code'], 'string', 'max' => 100],
            [['filter_desc', 'magnetic_desc', 'Notes'], 'string', 'max' => 255],
            [['Lab_No'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'grouploc' => Yii::t('app', 'Grouploc'),
            'Lab_No' => Yii::t('app', 'Lab  No'),
            'ComponentID' => Yii::t('app', 'Component ID'),
            'customer_id' => Yii::t('app', 'Customer ID'),
            'name' => Yii::t('app', 'Name'),
            'address' => Yii::t('app', 'Address'),
            'branch' => Yii::t('app', 'Branch'),
            'unit_id' => Yii::t('app', 'Unit ID'),
            'UNIT_NO' => Yii::t('app', 'Unit  No'),
            'MODEL' => Yii::t('app', 'Model'),
            'COMPONENT' => Yii::t('app', 'Component'),
            'OIL_TYPE' => Yii::t('app', 'Oil  Type'),
            'OIL_MATRIX' => Yii::t('app', 'Oil  Matrix'),
            'ORIG_VISC' => Yii::t('app', 'Orig  Visc'),
            'SAMPL_DT1' => Yii::t('app', 'Sampl  Dt1'),
            'RECV_DT1' => Yii::t('app', 'Recv  Dt1'),
            'RPT_DT1' => Yii::t('app', 'Rpt  Dt1'),
            'HRS_KM_OH' => Yii::t('app', 'Hrs  Km  Oh'),
            'HRS_KM_OC' => Yii::t('app', 'Hrs  Km  Oc'),
            'HRS_KM_TOT' => Yii::t('app', 'Hrs  Km  Tot'),
            'oil_change' => Yii::t('app', 'Oil Change'),
            'REFF' => Yii::t('app', 'Reff'),
            'ZDDP' => Yii::t('app', 'Zddp'),
            'PCCek' => Yii::t('app', 'Pccek'),
            'VISC_CST' => Yii::t('app', 'Visc  Cst'),
            'CST_CODE' => Yii::t('app', 'Cst  Code'),
            'visc_index' => Yii::t('app', 'Visc Index'),
            'visc_index_code' => Yii::t('app', 'Visc Index Code'),
            'VISC_SAE' => Yii::t('app', 'Visc  Sae'),
            'SAE_CODE' => Yii::t('app', 'Sae  Code'),
            'DILUTION' => Yii::t('app', 'Dilution'),
            'DILUT_CODE' => Yii::t('app', 'Dilut  Code'),
            'DIR_TRANS' => Yii::t('app', 'Dir  Trans'),
            'TRANS_CODE' => Yii::t('app', 'Trans  Code'),
            'OXIDATION' => Yii::t('app', 'Oxidation'),
            'OXID_CODE' => Yii::t('app', 'Oxid  Code'),
            'NITRATION' => Yii::t('app', 'Nitration'),
            'NITR_CODE' => Yii::t('app', 'Nitr  Code'),
            'WATER' => Yii::t('app', 'Water'),
            'WTR_CODE' => Yii::t('app', 'Wtr  Code'),
            'T_A_N' => Yii::t('app', 'T  A  N'),
            'TAN_CODE' => Yii::t('app', 'Tan  Code'),
            'T_B_N' => Yii::t('app', 'T  B  N'),
            'TBN_CODE' => Yii::t('app', 'Tbn  Code'),
            'ADD_PHYS' => Yii::t('app', 'Add  Phys'),
            'ADD_VALUE' => Yii::t('app', 'Add  Value'),
            'ADD_CODE' => Yii::t('app', 'Add  Code'),
            'NICKEL' => Yii::t('app', 'Nickel'),
            'NI_CODE' => Yii::t('app', 'Ni  Code'),
            'SOX' => Yii::t('app', 'Sox'),
            'SOX_CODE' => Yii::t('app', 'Sox  Code'),
            'GLYCOL' => Yii::t('app', 'Glycol'),
            'GLY_CODE' => Yii::t('app', 'Gly  Code'),
            'SILICON' => Yii::t('app', 'Silicon'),
            'SI_CODE' => Yii::t('app', 'Si  Code'),
            'IRON' => Yii::t('app', 'Iron'),
            'IRON_CONV' => Yii::t('app', 'Iron  Conv'),
            'FE_CODE' => Yii::t('app', 'Fe  Code'),
            'COPPER' => Yii::t('app', 'Copper'),
            'COPPER_CONV' => Yii::t('app', 'Copper  Conv'),
            'CU_CODE' => Yii::t('app', 'Cu  Code'),
            'ALUMINIUM' => Yii::t('app', 'Aluminium'),
            'ALUMUNIUM_CONV' => Yii::t('app', 'Alumunium  Conv'),
            'AL_CODE' => Yii::t('app', 'Al  Code'),
            'CHROMIUM' => Yii::t('app', 'Chromium'),
            'CHROMIUM_CONV' => Yii::t('app', 'Chromium  Conv'),
            'CR_CODE' => Yii::t('app', 'Cr  Code'),
            'MAGNESIUM' => Yii::t('app', 'Magnesium'),
            'MG_CODE' => Yii::t('app', 'Mg  Code'),
            'SILVER' => Yii::t('app', 'Silver'),
            'AG_CODE' => Yii::t('app', 'Ag  Code'),
            'TIN' => Yii::t('app', 'Tin'),
            'SN_CODE' => Yii::t('app', 'Sn  Code'),
            'LEAD' => Yii::t('app', 'Lead'),
            'LEAD_CONV' => Yii::t('app', 'Lead  Conv'),
            'PB_CODE' => Yii::t('app', 'Pb  Code'),
            'SODIUM' => Yii::t('app', 'Sodium'),
            'SODIUM_CONV' => Yii::t('app', 'Sodium  Conv'),
            'NA_CODE' => Yii::t('app', 'Na  Code'),
            'CALCIUM' => Yii::t('app', 'Calcium'),
            'CA_CODE' => Yii::t('app', 'Ca  Code'),
            'ZINC' => Yii::t('app', 'Zinc'),
            'ZN_CODE' => Yii::t('app', 'Zn  Code'),
            'ADD_MET' => Yii::t('app', 'Add  Met'),
            'ADD_MVAL' => Yii::t('app', 'Add  Mval'),
            'ADD_MCODE' => Yii::t('app', 'Add  Mcode'),
            'EVAL_CODE' => Yii::t('app', 'Eval  Code'),
            'UT_EMD' => Yii::t('app', 'Ut  Emd'),
            'UT_ESN' => Yii::t('app', 'Ut  Esn'),
            'RECOMM1' => Yii::t('app', 'Recomm1'),
            'RECOMM2' => Yii::t('app', 'Recomm2'),
            'RECOMM3' => Yii::t('app', 'Recomm3'),
            'RECOMM4' => Yii::t('app', 'Recomm4'),
            'MATRIX' => Yii::t('app', 'Matrix'),
            'Molybdenum' => Yii::t('app', 'Molybdenum'),
            'Molybdenum_CODE' => Yii::t('app', 'Molybdenum  Code'),
            'Boron' => Yii::t('app', 'Boron'),
            'Boron_CODE' => Yii::t('app', 'Boron  Code'),
            'Potassium' => Yii::t('app', 'Potassium'),
            'Potassium_CODE' => Yii::t('app', 'Potassium  Code'),
            'Barium' => Yii::t('app', 'Barium'),
            'Barium_CODE' => Yii::t('app', 'Barium  Code'),
            '4um' => Yii::t('app', '4um'),
            '4um_code' => Yii::t('app', '4um Code'),
            '6um' => Yii::t('app', '6um'),
            '6um_code' => Yii::t('app', '6um Code'),
            '15um' => Yii::t('app', '15um'),
            '15um_code' => Yii::t('app', '15um Code'),
            'ISO4406' => Yii::t('app', 'Iso4406'),
            'ISO4406_CODE' => Yii::t('app', 'Iso4406  Code'),
            'PQIndex' => Yii::t('app', 'Pqindex'),
            'PQIndex_CODE' => Yii::t('app', 'Pqindex  Code'),
            'colourcode' => Yii::t('app', 'Colourcode'),
            'colourcode_CODE' => Yii::t('app', 'Colourcode  Code'),
            'phosphor' => Yii::t('app', 'Phosphor'),
            'phosphor_code' => Yii::t('app', 'Phosphor Code'),
            'sulphur' => Yii::t('app', 'Sulphur'),
            'visc_40' => Yii::t('app', 'Visc 40'),
            'visc_40_code' => Yii::t('app', 'Visc 40 Code'),
            'seq_I' => Yii::t('app', 'Seq  I'),
            'seq_I_code' => Yii::t('app', 'Seq  I Code'),
            'seq_II' => Yii::t('app', 'Seq  Ii'),
            'seq_II_code' => Yii::t('app', 'Seq  Ii Code'),
            'seq_III' => Yii::t('app', 'Seq  Iii'),
            'seq_III_code' => Yii::t('app', 'Seq  Iii Code'),
            'filter_code' => Yii::t('app', 'Filter Code'),
            'filter_desc' => Yii::t('app', 'Filter Desc'),
            'magnetic_code' => Yii::t('app', 'Magnetic Code'),
            'magnetic_desc' => Yii::t('app', 'Magnetic Desc'),
            'KarlFischer' => Yii::t('app', 'Karl Fischer'),
            'RubbingWearSize' => Yii::t('app', 'Rubbing Wear Size'),
            'RubbingWearConc' => Yii::t('app', 'Rubbing Wear Conc'),
            'CuttingWearSize' => Yii::t('app', 'Cutting Wear Size'),
            'CuttingWearConc' => Yii::t('app', 'Cutting Wear Conc'),
            'ScuffingWearSize' => Yii::t('app', 'Scuffing Wear Size'),
            'ScuffingWearConc' => Yii::t('app', 'Scuffing Wear Conc'),
            'FatigueWearSize' => Yii::t('app', 'Fatigue Wear Size'),
            'FatigueWearConc' => Yii::t('app', 'Fatigue Wear Conc'),
            'FatigueLaminarSize' => Yii::t('app', 'Fatigue Laminar Size'),
            'FatigueLaminarConc' => Yii::t('app', 'Fatigue Laminar Conc'),
            'SpheresSize' => Yii::t('app', 'Spheres Size'),
            'SpheresConc' => Yii::t('app', 'Spheres Conc'),
            'DarkOxidesSize' => Yii::t('app', 'Dark Oxides Size'),
            'DarkOxidesConc' => Yii::t('app', 'Dark Oxides Conc'),
            'RedOxidesSize' => Yii::t('app', 'Red Oxides Size'),
            'RedOxidesConc' => Yii::t('app', 'Red Oxides Conc'),
            'NonFerrousSize' => Yii::t('app', 'Non Ferrous Size'),
            'NonFerrousConc' => Yii::t('app', 'Non Ferrous Conc'),
            'MiscDustSize' => Yii::t('app', 'Misc Dust Size'),
            'MiscDustConc' => Yii::t('app', 'Misc Dust Conc'),
            'Notes' => Yii::t('app', 'Notes'),
        ];
    }
}
