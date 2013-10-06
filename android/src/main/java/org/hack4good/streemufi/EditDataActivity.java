package org.hack4good.streemufi;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;

import org.hack4good.streemufi.model.Artist;

public class EditDataActivity extends Activity {


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_edit_data);
        setTitle("Step 2 enter data");

        findViewById(R.id.nextButton).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                copyUI2Artist();

                Intent intent = new Intent(EditDataActivity.this, UploadVideoActivity.class);
                startActivity(intent);
            }
        });
    }

    private void copyUI2Artist() {
        Artist artist = App.actArtist;

        EditText name = (EditText) findViewById(R.id.name);
        EditText contact = (EditText) findViewById(R.id.contact);
        EditText text = (EditText) findViewById(R.id.notes);

        artist.name = name.getText().toString();
        artist.contact = contact.getText().toString();
        artist.text = text.getText().toString();
    }

}
