package org.hack4good.streemufi.upload;

import org.apache.http.HttpResponse;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.DefaultHttpClient;
import org.hack4good.streemufi.Config;
import org.hack4good.streemufi.model.Artist;

import java.io.IOException;
import java.io.UnsupportedEncodingException;

public class RealBackendDataUploadService implements DataUploadService {

    @Override
    public void uploadArtist(Artist artist, SuccessCallback successCallback, FailCallback failCallback) {
        HttpClient httpclient = new DefaultHttpClient();
        HttpPost httppost = new HttpPost(Config.BACKEND_URL+"artist");

        try {
            httppost.setEntity(new StringEntity("your string"));
            HttpResponse resp = httpclient.execute(httppost);

            if (resp.getStatusLine().getStatusCode()==200) {
                successCallback.onSuccess();
            } else {
                failCallback.onFail();
            }

        } catch (UnsupportedEncodingException e) {
            failCallback.onFail();
        } catch (ClientProtocolException e) {
            failCallback.onFail();
        } catch (IOException e) {
            failCallback.onFail();
        }
    }

}
