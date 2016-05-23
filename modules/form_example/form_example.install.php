 

function form_example_schema(){
 $schema=array();
 $schema['from_example'] = array(
    'description' => 'An example table',
    'fields' => array(
      
      'fe_id' => array(
        'description' => 'The primary identifier for my table.',
        'type' => 'serial',
        'unsigned' => TRUE,
        'not null' => TRUE
        ),
      
      'myNumber' => array(
        'description' => 'A field for storing an integer number',
        'type' => 'int',
        'unsigned' => TRUE,
        'not null' => TRUE,
        'default' => 0),

      'mytextfield' => array(
        'description' => 'A field for storing short strings of text',
        'type' => 'varchar',
        'length' => 50,
        'not null' => TRUE,
        'default' => ''),
      
      'title' => array(
        'description' => 'A field for a longer text',
        'type' => 'varchar',
        'not null' => TRUE,
        'default' => ''),
      ),

    'indexes' => array(
      'form_example_mynumber' => array('mynumber'),
      ),
    'primary key' => array('fe_id'),
    );
}