package org.hack4good.streemufi;

import org.hack4good.streemufi.upload.DataUploadService;
import org.hack4good.streemufi.upload.MockVideoUploadService;
import org.hack4good.streemufi.upload.RealBackendDataUploadService;
import org.hack4good.streemufi.upload.VideoUploadService;

/*
just a very poor mans ServiceLocator for the time of the Hackathon
 */
public class ServiceLocator {

    public static VideoUploadService getVideoUploadService() {
        return new MockVideoUploadService();
    }

    public static  DataUploadService getDataUploadService() {
        //return new SadMockDataUploadService();
        return new RealBackendDataUploadService();
    }
}
