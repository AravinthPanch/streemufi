package org.hack4good.streemufi.upload;

import org.hack4good.streemufi.model.Artist;

public interface DataUploadService {

    public interface SuccessCallback {
        public void onSuccess();
    }

    public interface FailCallback {
        public void onFail();
    }

    public void uploadArtist(Artist artist,SuccessCallback successCallback,FailCallback failCallback);

}
