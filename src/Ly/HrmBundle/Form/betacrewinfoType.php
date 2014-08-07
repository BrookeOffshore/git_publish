<?php

namespace Ly\HrmBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class betacrewinfoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        	->add('name','text', array(
				'required' => false,
				'label' => 'Name',			
			))
            ->add('nationality','choice', array(
				'required' => false,            	
				'label' => 'Nationality',
				'empty_value' => false,
				'choices' => array(
					'N/A' => 'Choose a Nationality',
					'AF' => 'Afghanistan',
					  'AL' => 'Albania',
					  'DZ' => 'Algeria',
					  'AS' => 'American Samoa',
					  'AD' => 'Andorra',
					  'AO' => 'Angola',
					  'AI' => 'Anguilla',
					  'AQ' => 'Antarctica',
					  'AG' => 'Antigua and Barbuda',
					  'AR' => 'Argentina',
					  'AM' => 'Armenia',
					  'AW' => 'Aruba',
					  'AU' => 'Australia',
					  'AT' => 'Austria',
					  'AZ' => 'Azerbaijan',
					  'BS' => 'Bahamas',
					  'BH' => 'Bahrain',
					  'BD' => 'Bangladesh',
					  'BB' => 'Barbados',
					  'BY' => 'Belarus',
					  'BE' => 'Belgium',
					  'BZ' => 'Belize',
					  'BJ' => 'Benin',
					  'BM' => 'Bermuda',
					  'BT' => 'Bhutan',
					  'BO' => 'Bolivia',
					  'BA' => 'Bosnia and Herzegovina',
					  'BW' => 'Botswana',
					  'BV' => 'Bouvet Island',
					  'BR' => 'Brazil',
					  'BQ' => 'British Antarctic Territory',
					  'IO' => 'British Indian Ocean Territory',
					  'VG' => 'British Virgin Islands',
					  'BN' => 'Brunei',
					  'BG' => 'Bulgaria',
					  'BF' => 'Burkina Faso',
					  'BI' => 'Burundi',
					  'KH' => 'Cambodia',
					  'CM' => 'Cameroon',
					  'CA' => 'Canada',
					  'CT' => 'Canton and Enderbury Islands',
					  'CV' => 'Cape Verde',
					  'KY' => 'Cayman Islands',
					  'CF' => 'Central African Republic',
					  'TD' => 'Chad',
					  'CL' => 'Chile',
					  'CN' => 'China',
					  'CX' => 'Christmas Island',
					  'CC' => 'Cocos [Keeling] Islands',
					  'CO' => 'Colombia',
					  'KM' => 'Comoros',
					  'CG' => 'Congo - Brazzaville',
					  'CD' => 'Congo - Kinshasa',
					  'CK' => 'Cook Islands',
					  'CR' => 'Costa Rica',
					  'HR' => 'Croatia',
					  'CU' => 'Cuba',
					  'CY' => 'Cyprus',
					  'CZ' => 'Czech Republic',
					  'CI' => 'Côte d’Ivoire',
					  'DK' => 'Denmark',
					  'DJ' => 'Djibouti',
					  'DM' => 'Dominica',
					  'DO' => 'Dominican Republic',
					  'NQ' => 'Dronning Maud Land',
					  'DD' => 'East Germany',
					  'EC' => 'Ecuador',
					  'EG' => 'Egypt',
					  'SV' => 'El Salvador',
					  'GQ' => 'Equatorial Guinea',
					  'ER' => 'Eritrea',
					  'EE' => 'Estonia',
					  'ET' => 'Ethiopia',
					  'FK' => 'Falkland Islands',
					  'FO' => 'Faroe Islands',
					  'FJ' => 'Fiji',
					  'FI' => 'Finland',
					  'FR' => 'France',
					  'GF' => 'French Guiana',
					  'PF' => 'French Polynesia',
					  'TF' => 'French Southern Territories',
					  'FQ' => 'French Southern and Antarctic Territories',
					  'GA' => 'Gabon',
					  'GM' => 'Gambia',
					  'GE' => 'Georgia',
					  'DE' => 'Germany',
					  'GH' => 'Ghana',
					  'GI' => 'Gibraltar',
					  'GR' => 'Greece',
					  'GL' => 'Greenland',
					  'GD' => 'Grenada',
					  'GP' => 'Guadeloupe',
					  'GU' => 'Guam',
					  'GT' => 'Guatemala',
					  'GG' => 'Guernsey',
					  'GN' => 'Guinea',
					  'GW' => 'Guinea-Bissau',
					  'GY' => 'Guyana',
					  'HT' => 'Haiti',
					  'HM' => 'Heard Island and McDonald Islands',
					  'HN' => 'Honduras',
					  'HK' => 'Hong Kong SAR China',
					  'HU' => 'Hungary',
					  'IS' => 'Iceland',
					  'IN' => 'India',
					  'ID' => 'Indonesia',
					  'IR' => 'Iran',
					  'IQ' => 'Iraq',
					  'IE' => 'Ireland',
					  'IM' => 'Isle of Man',
					  'IL' => 'Israel',
					  'IT' => 'Italy',
					  'JM' => 'Jamaica',
					  'JP' => 'Japan',
					  'JE' => 'Jersey',
					  'JT' => 'Johnston Island',
					  'JO' => 'Jordan',
					  'KZ' => 'Kazakhstan',
					  'KE' => 'Kenya',
					  'KI' => 'Kiribati',
					  'KW' => 'Kuwait',
					  'KG' => 'Kyrgyzstan',
					  'LA' => 'Laos',
					  'LV' => 'Latvia',
					  'LB' => 'Lebanon',
					  'LS' => 'Lesotho',
					  'LR' => 'Liberia',
					  'LY' => 'Libya',
					  'LI' => 'Liechtenstein',
					  'LT' => 'Lithuania',
					  'LU' => 'Luxembourg',
					  'MO' => 'Macau SAR China',
					  'MK' => 'Macedonia',
					  'MG' => 'Madagascar',
					  'MW' => 'Malawi',
					  'MY' => 'Malaysia',
					  'MV' => 'Maldives',
					  'ML' => 'Mali',
					  'MT' => 'Malta',
					  'MH' => 'Marshall Islands',
					  'MQ' => 'Martinique',
					  'MR' => 'Mauritania',
					  'MU' => 'Mauritius',
					  'YT' => 'Mayotte',
					  'FX' => 'Metropolitan France',
					  'MX' => 'Mexico',
					  'FM' => 'Micronesia',
					  'MI' => 'Midway Islands',
					  'MD' => 'Moldova',
					  'MC' => 'Monaco',
					  'MN' => 'Mongolia',
					  'ME' => 'Montenegro',
					  'MS' => 'Montserrat',
					  'MA' => 'Morocco',
					  'MZ' => 'Mozambique',
					  'MM' => 'Myanmar [Burma]',
					  'NA' => 'Namibia',
					  'NR' => 'Nauru',
					  'NP' => 'Nepal',
					  'NL' => 'Netherlands',
					  'AN' => 'Netherlands Antilles',
					  'NT' => 'Neutral Zone',
					  'NC' => 'New Caledonia',
					  'NZ' => 'New Zealand',
					  'NI' => 'Nicaragua',
					  'NE' => 'Niger',
					  'NG' => 'Nigeria',
					  'NU' => 'Niue',
					  'NF' => 'Norfolk Island',
					  'KP' => 'North Korea',
					  'VD' => 'North Vietnam',
					  'MP' => 'Northern Mariana Islands',
					  'NO' => 'Norway',
					  'OM' => 'Oman',
					  'PC' => 'Pacific Islands Trust Territory',
					  'PK' => 'Pakistan',
					  'PW' => 'Palau',
					  'PS' => 'Palestinian Territories',
					  'PA' => 'Panama',
					  'PZ' => 'Panama Canal Zone',
					  'PG' => 'Papua New Guinea',
					  'PY' => 'Paraguay',
					  'YD' => 'People\'s Democratic Republic of Yemen',
					  'PE' => 'Peru',
					  'PH' => 'Philippines',
					  'PN' => 'Pitcairn Islands',
					  'PL' => 'Poland',
					  'PT' => 'Portugal',
					  'PR' => 'Puerto Rico',
					  'QA' => 'Qatar',
					  'RO' => 'Romania',
					  'RU' => 'Russia',
					  'RW' => 'Rwanda',
					  'RE' => 'Réunion',
					  'BL' => 'Saint Barthélemy',
					  'SH' => 'Saint Helena',
					  'KN' => 'Saint Kitts and Nevis',
					  'LC' => 'Saint Lucia',
					  'MF' => 'Saint Martin',
					  'PM' => 'Saint Pierre and Miquelon',
					  'VC' => 'Saint Vincent and the Grenadines',
					  'WS' => 'Samoa',
					  'SM' => 'San Marino',
					  'SA' => 'Saudi Arabia',
					  'SN' => 'Senegal',
					  'RS' => 'Serbia',
					  'CS' => 'Serbia and Montenegro',
					  'SC' => 'Seychelles',
					  'SL' => 'Sierra Leone',
					  'SG' => 'Singapore',
					  'SK' => 'Slovakia',
					  'SI' => 'Slovenia',
					  'SB' => 'Solomon Islands',
					  'SO' => 'Somalia',
					  'ZA' => 'South Africa',
					  'GS' => 'South Georgia and the South Sandwich Islands',
					  'KR' => 'South Korea',
					  'ES' => 'Spain',
					  'LK' => 'Sri Lanka',
					  'SD' => 'Sudan',
					  'SR' => 'Suriname',
					  'SJ' => 'Svalbard and Jan Mayen',
					  'SZ' => 'Swaziland',
					  'SE' => 'Sweden',
					  'CH' => 'Switzerland',
					  'SY' => 'Syria',
					  'ST' => 'São Tomé and Príncipe',
					  'TW' => 'Taiwan',
					  'TJ' => 'Tajikistan',
					  'TZ' => 'Tanzania',
					  'TH' => 'Thailand',
					  'TL' => 'Timor-Leste',
					  'TG' => 'Togo',
					  'TK' => 'Tokelau',
					  'TO' => 'Tonga',
					  'TT' => 'Trinidad and Tobago',
					  'TN' => 'Tunisia',
					  'TR' => 'Turkey',
					  'TM' => 'Turkmenistan',
					  'TC' => 'Turks and Caicos Islands',
					  'TV' => 'Tuvalu',
					  'UM' => 'U.S. Minor Outlying Islands',
					  'PU' => 'U.S. Miscellaneous Pacific Islands',
					  'VI' => 'U.S. Virgin Islands',
					  'UG' => 'Uganda',
					  'UA' => 'Ukraine',
					  'SU' => 'Union of Soviet Socialist Republics',
					  'AE' => 'United Arab Emirates',
					  'GB' => 'United Kingdom',
					  'US' => 'United States',
					  'ZZ' => 'Unknown or Invalid Region',
					  'UY' => 'Uruguay',
					  'UZ' => 'Uzbekistan',
					  'VU' => 'Vanuatu',
					  'VA' => 'Vatican City',
					  'VE' => 'Venezuela',
					  'VN' => 'Vietnam',
					  'WK' => 'Wake Island',
					  'WF' => 'Wallis and Futuna',
					  'EH' => 'Western Sahara',
					  'YE' => 'Yemen',
					  'ZM' => 'Zambia',
					  'ZW' => 'Zimbabwe',
					  'AX' => 'Åland Islands',
				)
			))
            ->add('craft','text', array(
				'required' => false,
				'label' => 'Craft',			
			))


            ->add('passportno','text', array(
				'required' => false,
				'label' => 'Passport',			
			))
            ->add('idno','text', array(
				'required' => false,
				'label' => 'ID Number',			
			))
            ->add('gender','choice', array(
			    'choices'   => array('Male' => 'Male', 'Female' => 'Female'),
			    'empty_value' => "Choose a Gender",			    
				'label' => 'Gender',			
			))
            ->add('birthday','date', array(
				'widget' => 'single_text',
				'required' => false,
				'label' => 'Date of Birth',
				'empty_value' => '',
				'format' => 'dd/MM/yyyy',
				'attr' => array(
					'class' => 'datepicker',
					'placeholder' => 'DD/MM/YYYY'
					)
			))
            ->add('placeofbirth','text', array(
				'required' => false,
				'label' => 'Place of Birth',			
			))
            ->add('passportissuedate','date', array(
				'widget' => 'single_text',
				'required' => false,
				'label' => 'Passport Issue Date',
				'empty_value' => '',
				'format' => 'dd/MM/yyyy',
				'attr' => array(
					'class' => 'datepicker',
					'placeholder' => 'DD/MM/YYYY'
					)
			))
            ->add('passportexpiredate','date', array(
				'widget' => 'single_text',
				'required' => false,
				'label' => 'Passport Expiry Date',
				'empty_value' => '',
				'format' => 'dd/MM/yyyy',
				'attr' => array(
					'class' => 'datepicker',
					'placeholder' => 'DD/MM/YYYY'
					)
			))
            ->add('passportissueplace','text', array(
				'required' => false,
				'label' => 'Passport Issue Place',			
			))
            ->add('poe','text', array(
				'required' => false,
				'label' => 'Port of Embarkation',			
			))
            ->add('seamanno','text', array(
				'required' => false,
				'label' => 'Seaman Number',			
			))
            ->add('seamanexpiredate','date', array(
				'widget' => 'single_text',
				'required' => false,
				'label' => 'Seaman Expiry Date',
				'empty_value' => '',
				'format' => 'dd/MM/yyyy',
				'attr' => array(
					'class' => 'datepicker',
					'placeholder' => 'DD/MM/YYYY'
					)
			))            
            ->add('mother','text', array(
				'required' => false,
				'label' => 'Mother Name',			
			))
            ->add('father','text', array(
				'required' => false,
				'label' => 'Father Name',			
			))
            ->add('contactno','text', array(
				'required' => false,
				'label' => 'Contact Number',			
			))
            ->add('homeno','text', array(
				'required' => false,
				'label' => 'Home Number',			
			))
            ->add('email','text', array(
				'required' => false,
				'label' => 'Email',			
			))
            ->add('bloodtype','choice', array(
			    'choices'   => array('A-' => 'A-',
									 'A' => 'A',
									 'A+' => 'A+',
									 'B-' => 'B-',
									 'B' => 'B',
									 'B+' => 'B+',
									 'O-' => 'O-',
									 'O' => 'O',
									 'O+' => 'O+',
									 'AB-' => 'AB-',
									 'AB-' => 'AB-',
									 'AB+' => 'AB+',),
			    'required'  => false,
				'label' => 'Blood Type',
			))
            ->add('address','textarea', array(
				'required' => false,
				'label' => 'Address',			
			))
            ->add('nokname','text', array(
				'required' => false,
				'label' => 'NOK Name',			
			))
            ->add('relationship','text', array(
				'required' => false,
				'label' => 'Relationship',			
			))
            ->add('education','text', array(
				'required' => false,
				'label' => 'Education',			
			))
            ->add('languages','text', array(
				'required' => false,
				'label' => 'Languages',			
			))
			
			->add('submit','submit',array(
						'attr' => array(
							'class' => 'small button'
						)
        	))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ly\HrmBundle\Entity\betacrewinfo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ly_hrmbundle_betacrewinfo';
    }
}
