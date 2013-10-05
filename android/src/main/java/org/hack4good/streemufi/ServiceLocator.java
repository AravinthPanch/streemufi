package org.hack4good.streemufi;

import org.hack4good.streemufi.upload.DataUploadService;
import org.hack4good.streemufi.upload.HappyMockDataUploadService;
import org.hack4good.streemufi.upload.MockVideoUploadService;
import org.hack4good.streemufi.upload.VideoUploadService;

/*
just a very poor mans ServiceLocator for the time of the Hackathon
 */
public class ServiceLocator {

    public VideoUploadService getVideoUploadService() {
        return new MockVideoUploadService();
    }

    public DataUploadService getDataUploadService() {
        return new HappyMockDataUploadService();
    }
}
