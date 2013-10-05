package org.hack4good.streemufi;

import android.os.Bundle;
import android.app.Activity;
import android.view.Menu;

public class EditDataActivity extends Activity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_edit_data);
        setTitle("Step 3 Artist-Data");
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }
    
}
